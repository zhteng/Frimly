<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Photo extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
