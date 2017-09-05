<?php
    //整个代码都是复制文档的！   次用处是防止未登录的用户的人  直接进入后台！
namespace App\Http\Middleware;

use Closure;
use Auth;//验证服务！

class Adminlogin
{
    public function handle($request, Closure $next)
    {
        //判断Auth的adminlogin的守卫 ->check()调用检查   如果是否的话  就返回！
        if(!Auth::guard('adminlogin')->check()){

            return redirect('admin/login');
        }
        return $next($request);
    }
}