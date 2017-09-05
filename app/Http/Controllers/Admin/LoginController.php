<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Middleware\Adminlogin;
use App\Http\Controllers\Controller;
use Auth;//引入的是验证服务 不需要路径了！
use Request;//也是服务



class LoginController extends Controller
{
//        这个执行函数是走adminlogin 中间件的 验证下没个都登录了吗的意思   同样的用法 我放到了路由后面而已，没放在这里
//    public function __construct()//默认执行 我自己创建的adminlogin 中间件！  only  是只执行 index方法
//    {
//        $this->middleware('Adminlogin')->only(['index']);
//    }

    public function login(){//登录方法
        return view('admin.login');//注意这里是点 不是/
    }




    public function index(){//进入后台方法！
        return view('admin.index');
    }


//Auth是lavare自带的验证服务性质的  找到config文件中的auth的类里面的guard！里面的adminlogin
    //登录验证方法
    public function loginin(){
//        dd(Request::input());
        //post到的数据提交到这里
        $state =    Auth::guard('adminlogin')->attempt([  //attempt得到这个字段

         //是post到的存进两个字段
            'username'=>Request::input('username'),//这里的inputh跟post  一个功能！post到密码和用户名
            'password'=>Request::input('password'),
        ]);
        //Auth::guard('adminlogin')里面有登录模型相当于有表数据。   和   attempt（）input到的字段进行对比 存进变量里！


        if($state){//匹配成功的话走  下面这个路由 进后台！
            //返回值为true
            return redirect('admin/index');         //redirwcrt   是重新定向的意思！
        }
        return redirect('admin/login')->with('error','用户名或密码错误！！');//重定向跳回到登录也面。也会出现字

    }


//    后台退出方法
    public function loginout(){
//    还是用到Auth验证服务的哪个守卫  调用logout自带退出功能！没找到文档这个在哪。。。
        Auth::guard('adminlogin')->logout();
        return redirect('admin/login');
    }

}
