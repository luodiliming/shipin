@extends('public.father')

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="/admin/lesson">课程列表</a></li>
        <li><a href="/admin/lesson/create">添加课程</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="100">ID</th>
            <th>课程</th>
            <th width="150">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['ltitle']}}</td>
                <td>
                    <div class="btn-group">
                        <a href="/admin/lesson/{{$v['id']}}/edit" type="button" class="btn btn-default">编辑</a>
                        <a href="javascript:;" onclick="del({{$v['id']}})" type="button" class="btn btn-default">删除</a>
                    </div>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <script>
        function del(id){
            require(['util'], function (util) {
                util.confirm('确定删除吗?',function(){
                   $.ajax({
                        url:'/admin/lesson/'+id,
                       method:'DELETE',
                       success:function (res) {
                            util.message(res.message,'refresh');
                       }
                   })
                })
            })
        }
    </script>
@endsection