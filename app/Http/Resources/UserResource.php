<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" =>$this->id,
            "name"=> $this->name,
            "services"=> ServiceResource::collection($this->services()->where('status',1)->orderBy('id', 'asc')->get()),
        ];
    }
}
