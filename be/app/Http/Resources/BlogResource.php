<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title_blog' => $this->title_blog,
            'image_blog' => $this->image_blog,
            'content_blog' => $this->content_blog,
            'create_by' => $this->create_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
