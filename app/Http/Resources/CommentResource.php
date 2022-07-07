<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'type'=> 'comments',
            'attributes'=> [
                'post'=> $this->post->title,
                'author'=> $this->author->name,
                'status'=> $this->status
            ],

        ];
    }
}
