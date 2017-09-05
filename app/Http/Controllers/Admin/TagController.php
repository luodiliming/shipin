<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Tag;//一开始模型得到的数据标签表肯定是空的e

use App\Http\Requests\TagRequest;//用他调用会判断 框框里面。有没有按要求填写 !
use App\Http\Controllers\Controller;

class TagController extends Controller
{
        //显示标签模板
    public function index()
    {
        $data = Tag::get();  //模型不就是表嘛 get()到数据
        return view('admin.tag.index',compact('data'));//数据分配过去！
    }


    //显示添加标签模板
    public function create()
    {
        return view('admin.tag.create');
    }


    //存储会自动的  post到得来的东西！文档有
    public function store(TagRequest $TagRequest, Tag $tag)//这是模型注入Tag 是 tag模型的到的数据
    {
        $tag->create($TagRequest->all());//创建获得的全部
//        flash()->overlay('标签添加成功');//闪存。使用闪光 后面可以加方法的会让更优化点，保存或者修改了之后  会告诉你弄好了  但是需要在Composer中文网 里面的安装包列表！搜索下flash   laracasts/flash这个东西安装下  就自动运行的！
        return redirect('/admin/tag');//重定向走路由！
    }



    public function show(Tag $tag)
    {
        //
    }


        //下面是修改方法！
    public function edit($id)
    {
       $data =  Tag::find($id);//通过模型也是表 调用这一条数据！
        return view('admin.tag.edit',compact('data'));
    }


    //下面是更新方法！
    //这里是修改后post自动找的方法。这就是资源控制器的好处！带的修改的那条参数过来
    public function update(TagRequest $TagRequest,$id)
    {
        $model = Tag::find($id);        //在次获取这条数据存起来！
        $model->name = $TagRequest['name'];//因为TagRequest的模型注入现在是。里面有name值！好吧都是通过他 。然后在赋回去
        $model->save();
        return redirect('/admin/tag');//修改更新好了  就重定向跳走了
    }


    //下面是删除
    public function destroy($id)
    {
        Tag::destroy($id);//这个模型调用破坏性操作 删除这条数据！
//        return redirect()->json(['message' => '标签删除成功', 'valid' => 1]);
//        老师这招不 行吖
        return redirect('/admin/tag');
    }
}
