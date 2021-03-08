<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::whereHas('rol', function ($query) {
            $query->where('rol','user');
        })->orderBy('id', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (Auth::user()->rol_id=='2') {

            if($user->status){
                $user->status = false;
            }else{
                $user->status = true;
            }
            $user->save();

            return redirect()->route('admin.users.index');

        } else {
            return abort(401, 'Unauthorized action.');
        }


    }
}
