<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected  $table="users";

    protected  $primaryKey='id';

    public static function createtoken($name,$len=30)
    {
        $str="1234567890qwertyuiopasdfghjklzxcvbnm";

        $s="";
        for($i=0;$i<$len;$i++){
            $s.=$str{mt_rand(1,30)};
        }
        return base64_encode($name).$s;

    }

    public static function error($code=200,$msg="ok",$data=[])
    {
        $arr=[
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        die(json_encode($arr));
    }
}
