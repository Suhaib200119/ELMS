<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveRequestResponseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
use App\Models\Leave;
use App\Models\Leave_Request_Response;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(Auth::user()->user_type=="Administrator"){
        return view('dashboard',[
            "user_count"=>User::where("user_type","!=","Administrator")->get()->count(),
            "leave_count"=>Leave::count(),
            "leave_request_count"=> Leave_Request_Response::where("status","=","waiting")->get()->count(),
        ]);

    }else{
       
        return redirect()->route("indexRequest_user");
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth',"applayChangeLang")->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("/leaves",LeaveController::class);
    Route::resource("/users",UserController::class);

    Route::get("/leavesRequests/user",[LeaveRequestResponseController::class,"indexRequest_user"])->name("indexRequest_user");
    Route::get("/leavesRequests/create",[LeaveRequestResponseController::class,"createRequest_user"])->name("createRequest_user");
    Route::post("/leavesRequests/store",[LeaveRequestResponseController::class,"storeRequest_user"])->name("storeRequest_user");
    Route::get("/leavesRequests/admin",[LeaveRequestResponseController::class,"indexRequest_admin"])->name("indexRequest_admin");
    Route::put("/leavesRequests/{id}/response",[LeaveRequestResponseController::class,"responseOnRequest"])->name("responseOnRequest");
    Route::get("/lang/changeLang",[LangController::class,"changeController"])->name("changeLang");

    Route::get("/roles_users/{user_id}",[RoleUserController::class,"create"])->name("roles_users.create");
    Route::post("/roles_users",[RoleUserController::class,"store"])->name("roles_users.store");
    Route::get("/roles_users",[RoleUserController::class,"getRoles"])->name("roles_users.getRoles");


});

require __DIR__.'/auth.php';
