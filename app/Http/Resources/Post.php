<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
    	var_dump($request);die;

        return [
            'id' => $this->id,
            'title' => $this->title,

            'content' => $this->content,

        ];
    }
}
