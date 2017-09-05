<?php

namespace App\Http\Requests;
use Validator;//一个现存的验证器实例中的 validate 方法。服务！
use Hash;//Laravel 通过 Hash facade 提供 Bcrypt 加密来保存用户密码。 就是加密服务
use Auth;

use Illuminate\Foundation\Http\FormRequest;
//如果本次请求的参数未通过我们指定的验证规则呢？正如前面所提到的，
//Laravel 会自动把用户重定向到（先前的位置。）另外，所有的验证错误会被自动 闪存至 session。
//先前的位置不是就是输入原密码的路由吗 在追不是到父级模板嘛

class passwordRequest extends FormRequest
{

//    开启
    public function authorize()
    {
        return true;//这里首先为true 为使用的意思！
    }

        //这个方法得到的是 输入的原密码 跟数据库里的密码进行对比
    public function addValide(){
 //    check_oldpassword是一个方法得到的结果只有真或假   1:要被验证的属性名称 2:属性的值 3:传入验证规则的参数数组  4:实例
        Validator::extend('check_oldpassword', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value,Auth::guard('adminlogin')->user()->password);
   //返回密码对比的真假   $value是输入的原密码      后面的是守卫里面的密码 这两个进行对比
        });

    }


//            这只是输入时设定的要求和规则以及调用了上面的  输入原密码和 数据库里面的密码进行对比为真的
    public function rules()
    {
        $this->addValide();//调用这个方法在这用
//            加一些输入时的限制，比如全是数字啦 或者不能为空之类的规则
//        在输入数据中有此字段时才进行验证。可通过增加 sometimes 规则到规则列表来实现：

        return [
//  原密码规则有：  1:输入数据中有此字段时才进行验证 2:不能为空3:从上面对比得到的为真的密码
            'oldpassword'=>'sometimes|required|check_oldpassword',
//  新密码规则有：  1:输入数据中有此字段时才进行验证 2:不能为空3:长度要到 6-20位
            'password'=>'sometimes|required|confirmed|between:6,20',  //confirmed 放进了这个字段，就必须呀跟password_confirmation保持一致
// 确认密码规则有： 1:输入数据中有此字段时才进行验证 2:不能为空
            'password_confirmation'=>'sometimes|required',

        ];
    }


    //自定义错误消息，转成中文   所有的验证错误会被自动 闪存至 session。
    //请注意在 GET 路由中，我们无需显式的将错误信息和视图绑定起来。
    //这是因为 Lavarel 会检查在 Session 数据中的错误信息，然后如果对应的视图存在的话，自动将它们绑定起来
    //变量 $errors 这里
    public function messages()
    {
        return [
            'oldpassword.required'=>'久数据不能为空',
            'password.required' => '新密码不能为空',
            'password_confirmation.required' => '确认密码不能为空',
            'password.confirmed' => '两次密码输入不一致',
            'oldpassword.check_oldpassword' => '旧密码不正确',
            'password.between' => '密码必须是6-20位',
        ];
    }






}
