<?php

namespace App\Http\Controllers\api\v1\upload;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login(){

        return view('upload.login');
    }
}
