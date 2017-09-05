<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Video;
use App\Admin\Lesson;   //lesson  模型先引进来  拿数据
use App\Admin\Tag;    //标签的模型
use Illuminate\Http\Request;   //他是多用途的集合体 可以用它！
use App\Http\Controllers\Controller;

class LessonController extends Controller
{

    //显示模板
    public function index()
    {
        //get到lesson模型也是表的所有内容！
        $data = Lesson::get();
        return view('admin.lesson.index',compact('data'));//分配数据
    }


    //创建方法！
    public function create()
    {
//        获取所有的标签
        $data = Tag::get();
        return view('admin.lesson.create',compact('data'));//跳到创建模型  分配标签内容。好选择！
    }



    //创建后 储存方法！
    public function store(Request $request)//Request   多用途的结合体
    {
//        echo '<pre>';
//        var_dump($request->all());
        //保存lesson表数据
        $lesson = new Lesson;//实例化这个方法
        $lesson['ltitle'] = $request['ltitle'];
        $lesson['introduce'] = $request['introduce'];
        $lesson['pic'] = $request['pic'];
        $lesson['author'] = $request['author'];
        $lesson['iscommond'] = $request['iscommond'];
        $lesson['ishot'] = $request['ishot'];
        $lesson['tag_ids'] = implode(',',$request['tag_ids']);//把数组元素组合为字符串：
        $lesson->save();//在保存

        //保存视频表数据
        $videos = json_decode($request['videos'],JSON_UNESCAPED_UNICODE);
        foreach ($videos as $v){
                //上面的存储方法是固定的 这里遍历储存是因为!不知道有个要添加所以遍历添加,不想上面直接输入好了,就存进去!
            $lesson->videos()->create([
                'title'=>$v['title'],
                'path'=>$v['path'],
                'click'=>$v['click'],
                'desc'=>$v['desc'],
            ]);
        }
        return redirect('/admin/lesson');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }



    //编辑修改方法！
    public function edit($id)
    {
        //获取所有的标签
        $data = Tag::get();
        //获取lesson表中的数据
        $lesson = Lesson::find($id);
        $lesson['tag_ids'] = explode(',',$lesson['tag_ids']);
        $videos = json_encode($lesson->videos()->get(),JSON_UNESCAPED_UNICODE);
        return view('admin.lesson.edit',compact('data','lesson','videos'));
    }




    //修改过后  更新下！
//        在次重新存进来！
    public function update(Request $request, $id)
    {
        //保存lesson表数据
        $lesson = Lesson::find($id);
        $lesson['ltitle'] = $request['ltitle'];
        $lesson['introduce'] = $request['introduce'];
        $lesson['pic'] = $request['pic'];
        $lesson['author'] = $request['author'];
        $lesson['iscommond'] = $request['iscommond'];
        $lesson['ishot'] = $request['ishot'];
        $lesson['tag_ids'] = implode(',',$request['tag_ids']);
        $lesson->save();
        //保存视频表数据
        Video::where('lesson_id','=',$id)->delete();
        $videos = json_decode($request['videos'],JSON_UNESCAPED_UNICODE);
        foreach($videos as $v){
            $lesson->videos()->create([
                'title'=>$v['title'],
                'path'=>$v['path'],
                'click'=>$v['click'],
                'desc'=>$v['desc'],
            ]);
        }
        return redirect('/admin/lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除lesson数据
        Lesson::destroy($id);
        //video表的删除
        Video::where('lesson_id','=',$id)->delete();

        return response()->json(['message' => '课程删除成功', 'valid' => 1]);
    }


}
