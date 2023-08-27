<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Http\Requests\LeaveRequestFromUserRequest;
use App\Models\Leave_Request_Response;
use App\Policies\ApproveRequest;
use App\Policies\ApproveRequestPolicy;
use App\Policies\Leave_Request_Resonse_Policy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Leave_Request_Response::class=>Leave_Request_Resonse_Policy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
