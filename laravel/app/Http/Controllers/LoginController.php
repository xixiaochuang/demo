<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $name=$request->name ?? "";
        $pwd=$request->pwd ?? "";
        $email=$request->email ?? "";
        if($name=='' || $pwd=="" ||$email){
            $this->error(4001,'参数缺失');
        }
        $info=DB::table('user')->where(['name'=>$name])->first();
        if($info){
            echo 123;exit;
        }else{
            echo 1234;exit;
        }
        $pwd=encrypt($pwd);


    }


}
