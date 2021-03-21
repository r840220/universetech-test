<?php

namespace App\Services;

class BlacklistChecker
{
	protected $size;
	protected $hashList;
	protected $blackIndexs = [];

	public function __construct($size = 10000, $hashList = ['md5', 'sha256', 'sha512'])
	{
		$this->size = $size;
		$this->hashList = $hashList;
	}

	public function setBlackUrl($url)
	{
		foreach($this->hashList as $hashName) {
			// 因數字太大會有計算問題 縮短雜湊值
			$index = hexdec(substr(hash($hashName, $url), 0, 9)) % $this->size;
			$this->blackIndexs[$index] = true;
		}
	}

	public function isBlackUrl($url)
	{
		$isBlackUrl = true;
		foreach($this->hashList as $hashName) {
			// 因數字太大會有計算問題 縮短雜湊值
			$index = hexdec(substr(hash($hashName, $url), 0, 9)) % $this->size;
			$isBlackUrl = $isBlackUrl && isset($this->blackIndexs[$index]);
		}

		return $isBlackUrl;
	}
}