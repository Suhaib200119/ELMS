<?php

namespace App\Http\Controllers;

use App\Models\Leave_Request_Response;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleUserController extends Controller
{
  
    public function create(String $user_id)
    {
        return view("roles.add-role",[
            "roles"=>Role::all(),
            "user_id"=>$user_id,
        ]);
    }

  
    public function store(Request $request)
    {
        $rolesIds=$request->post("roles");
        foreach ($rolesIds as  $id) {
           $roleUser = new  RoleUser();
           $roleUser->user_id=$request->post("user_id");
           $roleUser->role_id=$id;
           $roleUser->save();
        }
        Session::flash("success","roles adding");
        return redirect()->route("users.index");
        
    }

    public function getRoles(){
        $roles=Auth::user()->roles;
        return view("users-interface.user_roles")->with("roles",$roles);
        
    }

   
}
