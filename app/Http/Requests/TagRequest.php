<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//开启要求
    }

    /**
     * 获取适用于请求的验证规则。  下面是的
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'sometimes|required',   //input 中的  name=‘name’   name值叫什么   这里就用什么  后面是要求不能为空呀之类的
        ];
    }



        //
    public function messages()
    {
        return [
            'name.required' => '标签名称不能为空',
        ];
    }



}
