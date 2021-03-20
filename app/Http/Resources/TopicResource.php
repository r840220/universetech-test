<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray()
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'comments' => $this->resource->comments
        ];
    }
}