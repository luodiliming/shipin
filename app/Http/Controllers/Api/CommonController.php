<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
            //处理返回json数据的方法
    public function response($data,$code=200){
        return ['data'=>$data,'code'=>$code];
    }
}
