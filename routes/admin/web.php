<?php

//路由组为了省前缀
//laravel提供这样的写法
//
        //   前缀是                命名空间
        //get到的路由               跳转到admin  下面的哪个控制器~
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::get('/login','LoginController@login');//get到admin/login路由  在进入类在找 登录方法
        Route::post('/login','LoginController@loginin');//post到 admin/login的数据  在进入类找验证方法
        Route::get('/index','LoginController@index')->middleware('Adminlogin');//进入后台路由！

//        后台退出
        Route::get('/loginout','LoginController@loginout');
        //修改密码
        Route::get('/changePassword','MyController@passwordForm');//把修改密码写成 一个单独的类  这是到admin/MyController 的类找方法了
        Route::post('/changePassword','MyController@changePassword');//上面输入好的。就是要post到输入表的数据！所以同样post到这个changePassword 路由。去找一样的类。方法就是要修改的了！

        //内容标签
        //标签管理的资源路由
        Route::resource('tag', 'TagController');
        //上传文件的路由！
        Route::resource('lesson','LessonController');
//
//    //        //视频管理  资源控制器
//        Route::resource('lesson','LessonController');

});







