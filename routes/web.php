<?php
header('Access-Control-Allow-Origin:*');  //这个是跨域处理的东西！




//路由：
//在路由里return 和 echo  都一样!
Route::get('/', function () {
    return view('welcome');//返回的是静态资源resources文件夹中找welcomephp
});

//相当于把admin/web.php引入到默认。lavare默认指向的路由端口





//上传文件的路由
Route::any('/component/upload','component\UploadController@uploader');//创建图片文件的路由
Route::any('/component/filesLists','component\UploadController@filesLists');//生成图片文件的路由
Route::any('/component/oss','component\OssController@sign');//上传视屏的路由  在lesson里面的create 里面有写路由！


include __DIR__.'/admin/web.php';//前面要带上  /admin  相当于把admin里面的路由放到这了
include __DIR__ . '/api/videos.php';//这个是视屏的路由










//match可以匹配多种获得参数的办法
//Route::match(['get', 'post'], '/', function () {
//    echo 'match';
//});
//
////any是匹配任何一个get，post。put等等
//Route::any('foo', function () {
//    //
//});



//路由一个参数：
//{id}这个参数是必填的！ user参数的{id}  传进function当参数！ {id} = $id
//Route::get('user/{id}', function ($i) {
//    return 'User '.$i;
//});

//多条参数。依次对饮后面的参数
//Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
//    return $commentId;
//});




//可选参数路由
// 后面的函数参数要定义一个null空。要不会报错！
//Route::get('user/{id?}', function ($i=null) {
//    return 'User '.$i;
//});
//可选多条参数路由
////http://localhost/laravel/public/posts/comments  只有最后
//Route::get('posts/{post?}/comments/{comment?}', function ($postId=null, $commentId=null) {
//    return $postId.'---'.$commentId;
//});











