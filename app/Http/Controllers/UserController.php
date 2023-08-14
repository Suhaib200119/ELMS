<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=User::where("user_type","=","Employee")->paginate(5);
        return view("users.user-index",[
            "employees"=>$employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.user-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated=$request->validated();
        $user=new User();
        $user->name=$request->post("name");
        $user->email=$request->post("email");
        $user->user_type=$request->post("user_type");
        $user->password=Hash::make($request->post("name"));
        if($user->save()){
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view("users.user-edit",[
            "user"=>$user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated=$request->validated();
        $user=User::findOrFail($id);
        $user->name=$request->post("name");
        $user->email=$request->post("email");
        $user->user_type=$request->post("user_type");
        // $user->password=Hash::make($request->post("name"));
        if($user->save()){
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(User::destroy($id)>0){
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("users.index");
    }
}
