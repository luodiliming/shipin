@extends('public.father')

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="/admin/tag">标签列表</a></li>
        <li><a href="/admin/tag/create">添加标签</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="100">ID</th>
            <th>标签</th>
            <th width="150">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td>
                    <div class="btn-group">
                                    {{--这里还就必须要把参数放到edit方法前面才行--}}
                        <a href="/admin/tag/{{$v['id']}}/edit" type="button" class="btn btn-default">编辑</a>
                        <a href="javascript:;" onclick="del({{$v['id']}})" type="button" class="btn btn-default">删除</a>
                            {{--先不跳，后面来个点击事件，问下要不要删除  js的东西  要带删除的！--}}
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
                        url:'/admin/tag/'+id,
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