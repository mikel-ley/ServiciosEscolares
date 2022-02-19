<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
    }

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit',$user)->with('info','Se actualizó la información de los roles correctamente');
    }


    public function destroy($id)
    {
        //
    }
}
