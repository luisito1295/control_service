<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);
        $services = Auth::user()->services()->orderBy('id', 'asc')->get();
        return view('admin.services.index', compact('services', 'user'));
    }
}
