<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=> (string) $this->id,
            'type'=> 'posts',
            'attributes'=>[
                'title'=> $this->title,
                'author'=> $this->author->name,
                'content'=> $this->content,
                'views'=> (string) $this->views,
                'likes'=> (string) $this->likes,
                'image'=> $this->image
            ]
        ];
    }
}
