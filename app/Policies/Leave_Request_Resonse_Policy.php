<?php

namespace App\Policies;

use App\Models\Leave_Request_Response;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class Leave_Request_Resonse_Policy
{
    public function viewRequests(User $user): bool{
        $vr=false;
        foreach ($user->roles as $role) {
            if($role->role_name=="view requests"){
                $vr=true;
                break;
            }
        }
        return $user->user_type=="Administrator" || $vr ; //$user->roles()->wherePivot("role_id","=",3)
       }
}
