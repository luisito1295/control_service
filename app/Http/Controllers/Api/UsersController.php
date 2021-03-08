<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UsersCollection;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    
    public function index()
    {
        return new UsersCollection(User::where('status',1)->orderBy('id', 'asc')->get());
    }
}
