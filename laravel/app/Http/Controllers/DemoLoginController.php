<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;

class DemoLoginController extends Controller
{
    public function login(Request $request)
    {
        $name=$request->name ?? "";
        $pwd=$request->pwd ?? "";
        $redis=new \redis();
        $redis->connect('127.0.0.1',6379);
        if(!$name || !$pwd){
            Users::error('1001','Password or username qieshi');
        }
        $info=Users::where(['name'=>$name])->first();
       if($info){
           if(decrypt($info->pwd)!=$pwd){
               Users::error('1002','Password or username error');
           }
           $token=Users::createtoken('xixiaochuang');
           $redis->set($name.'token',$token,10);
           Users::error('200',"ok",['token'=>$token]);
       }else{
           Users::error('1002','Password or username error');
       }
    }
}
