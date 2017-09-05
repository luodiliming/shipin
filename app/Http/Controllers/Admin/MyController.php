<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\passwordRequest;//这个是检验修改密码的
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    //进入修改密码页面
    public function passwordForm(){
        return view('admin.my.index');
    }

    //修改方法
    public function changePassword(passwordRequest $request){//passwordRequest是个类！ 实例化成了$request留下面好用
        //获取当前登录用户的所有数据信息
        $model =Auth::guard('adminlogin')->user();//user()方法是获取全部！
        //只修改密码
        $model->password = bcrypt($request['password']);//加密是passwordRequest类一系列的操作的（确认密码的数据）而已
        //用模型的保存数据
        $model->save();
//        flash()->overlay('密码修改成功');//闪存。使用闪光 后面可以加会让更优化点，保存或者修改了之后  会告诉你弄好了  但是需要在Composer中文网 里面的安装包列表！搜索下flash   laracasts/flash这个东西安装下  就自动运行的！
        return redirect()->back(); //返回并重定向 到上一层
    }
}
