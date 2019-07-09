<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
       header('Access-Control-Allow-Origin: *');
        echo "123";
    }
}
