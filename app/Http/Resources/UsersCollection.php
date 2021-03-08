<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\UserResource';

    public function toArray($request)
    {
        //dd($this->collection);
        return [
            'status'=>'OK',
            'data'=>[
                'users'=> $this->collection
            ]
        ];
    }
}
