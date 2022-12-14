<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
//use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'is_block'=>$this->is_block,
            'created_at'=>$this->created_at,
        ];
    }
}
