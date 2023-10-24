<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     public function index()
    {
        return view('admin.user.index');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'email'         => 'required|unique:users,email',
            'password'      => 'required',
        ]);
        User::newUser($request);
        return back()->with('message', 'User info created successfully');
    }

    public function edit($id)
    {
        return view('admin.user.edit',[
            'user' => User::find($id),
        ]);
    }

    public function manage()
    {
        return view('admin.user.manage',[
            'users' => User::all(),
        ]);
    }

    public function update(Request $request,$id)
    {
        User::updateUser($request, $id);
        return redirect('/user/manage')->with('message', 'User info updated successfully.');
    }

    public function delete($id)
    {
        User::deleteUser($id);
        return back()->with('message', 'User info deleted successfully.');
    }


}
