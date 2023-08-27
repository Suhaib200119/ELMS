<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequestFromUserRequest;
use App\Models\Leave;
use App\Models\Leave_Request_Response;
use Carbon\Carbon;
use DateTime;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveRequestResponseController extends Controller
{
    public function indexRequest_user()
    {
        return view("users-interface.index-request", [
            "leaves_requests" => Auth::user()->leaves_requests,
        ]);
    }

    public function createRequest_user()
    {
        return view("users-interface.create-request", [
            "leaves_types" => Leave::all(),
        ]);
    }

    public function storeRequest_user(LeaveRequestFromUserRequest $request)
    {
        $leave_request = new Leave_Request_Response();
        $leave_request->user_id = Auth::id();
        $leave_request->leave_id  = $request->post("leave_type");
        $leave_request->start_date  = $request->post("start_date");
        $leave_request->end_date  = $request->post("end_date");
        $datetime1 = new DateTime($request->post("start_date"));
        $datetime2 = new DateTime($request->post("end_date"));
        $interval = $datetime1->diff($datetime2);
        $leave_request->days_count = $interval->format('%a');
        if ($leave_request->save()) {
            Session::flash("success","Success Operation");
        }
        return redirect()->route("indexRequest_user");
    }


    public function indexRequest_admin()
    {
        // $this->authorize("viewRequests",[Leave_Request_Response::class]);
        return view("requests.index", [
            "leaves_requests" => Leave_Request_Response::where("status","=","waiting")->paginate(3),
        ]);
    }
    public function responseOnRequest(Request $request,String $request_id){
     
        $request->validate(
            [
                "deny_reason"=>"required_if:response,Deny"
            ]
        );
        $leave_request=Leave_Request_Response::findOrFail($request_id);
        $leave_request->status=$request->post("response");
        if($request->post("response")=="Deny"){
            $leave_request->deny_reason=$request->post("deny_reason");
        }
        

        if($leave_request->save()){
            Session::flash("success","Success Operation");
        }
        return redirect()->route("indexRequest_admin");

    }
}
