<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeController(Request $request){
        Session::put("lang",$request->query("lang"));
        return back();
    }
}
