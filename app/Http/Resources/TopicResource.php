<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
	public static function collection($resource)
	{
		$resource->loadMissing('comments');

		return parent::collection($resource);
	}

    public function toArray()
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'comments' => $this->resource->comments
        ];
    }
}