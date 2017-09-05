<?php

namespace App\Http\Controllers\Api;

use App\Admin\Lesson;
use App\Admin\Tag;
use App\Admin\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//          继承CommonController 用里面的方法  处理数据
class VideoController extends CommonController
{
    //推荐课程接口
    public function commondeLessons($row){
        $data = Lesson::where('iscommond',1)->limit($row)->get();  //推荐=1的  =0就是不是推荐，所以要wherelimit获取参数是需要第几条
        return $this->response($data);
    }
//    //热门课程接口
    public function hotLessons($row){
        $data = Lesson::where('ishot',1)->limit($row)->get();
        return $this->response($data);
    }
//    //获取所有课程接口
    public function lessons($tid){
//判断 模板带来的参数     tag.ids 是标签！匹配   $tid是带来的参数有的话！就获得
        if($tid){
            $data = Lesson::where('tag_ids','like','%'.$tid.'%')->get();
        }else{
            $data = Lesson::get();//那就获得全部！
        }
        //
        return $this->response($data);
    }
//    //获取所有标签接口
    public function tags(){
        $data = Tag::get();
        return $this->response($data);
    }
//    获取对应课程所有视频接口
    public function videos($lessonId){
        $data = Video::where('lesson_id','=',$lessonId)->get();
        return $this->response($data);
    }
    //获取对应课程信息接口
    public function lessonInfo($lessonId){
        $data = Lesson::find($lessonId);
        return $this->response($data);
    }
}
