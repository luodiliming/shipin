<?php
//   发接口的再app       视屏接口路由
Route::group(['prefix'=>'api','namespace'=>'Api'],function (){
    //推荐视频接口路由
    Route::get('commondLessons/{row}','VideoController@commondeLessons');
//    //热门视频接口路由
    Route::get('hotLessons/{row}','VideoController@hotLessons');
//    //获取所有课程或者某个标签下课程的接口路由
    Route::get('lessons/{tid}','VideoController@lessons');
//    //获取所有标签接口路由
    Route::get('tags','VideoController@tags');
//    //获取对应课程所有视频接口路由
    Route::get('videos/{lessonId}','VideoController@videos');
//    //获取对应课程信息接口路由
    Route::get('lessonInfo/{lessonId}','VideoController@lessonInfo');

});
