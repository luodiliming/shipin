<?php
//上传控制器!
namespace App\Http\Controllers\component;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
//    //上传文件 创建目录！
//    public function uploader(Request $Request){
//        $file =$Request->file;//通过依赖注入 请求来调用获得上传文件
//        if($file->isValid()){//isValid 方法验证上传的文件是否有效：
//           $path =  $file->store(data('ymd'),'fileupload');//里面的参数是以年月日保存！后面是文件名！
//            return ['valid'=>1,'message'=>asset('fileupload/' . $path)];//返回返回  真！然后创建这个文件夹
//        }
//        return ['valid'=>0,'message'=>'图片上传失败！'];//上传失败返回的是假 还有一句话!
//    }上面是写错了  就是有报错哦！


    public function uploader(Request $request) {
        $file = $request->file;
        if($file->isValid()){
            $path = $file->store(date('ymd'),'fileupload');
            return ['valid'=>1,'message'=>asset('fileupload/' . $path)];

        }
        return ['valid'=>0,'message'=>'图片上传失败'];

    }












    //文上传件列表！开始给个空的！
    public function filesLists() {
        return [ 'data' => [], 'page' => ''];
    }




}
