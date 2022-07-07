<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=> $this->id,
            'type'=> 'users',
            'attributes'=>[
                'name'=> $this->name,
                'username'=> $this->username,
                'role'=> $this->role,
                'gender'=> $this->gender,
                'email'=> $this->email,
                'image'=> $this->img
            ]
        ];
    }
}
