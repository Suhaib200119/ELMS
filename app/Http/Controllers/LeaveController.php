<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $leaves = $user->leaves;
        return view("leaves.leave-index", [
            "leaves" => $leaves
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("leaves.leave-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveRequest $request)
    {
        $validated = $request->validated();
        $leave = new Leave();
        $leave->leave_name = $request->post("leave_name");
        $leave->leave_description = $request->post("leave_description");
        $leave->user_id = Auth::id();
        if ($leave->save()) {
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("leaves.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $leave = Leave::findOrFail($id);
        return view("leaves.leave-edit", [
            "leave" => $leave
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveRequest $request,String $id)
    {
        $validated = $request->validated();
        $leave = Leave::findOrFail($id);
        $leave->leave_name = $request->post("leave_name");
        $leave->leave_description = $request->post("leave_description");
        $leave->user_id = Auth::id();
        if ($leave->save()) {
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("leaves.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        if (Leave::destroy($id) > 0) {
            Session::flash("success", "Operation Done");
        }
        return redirect()->route("leaves.index");
    }
}
