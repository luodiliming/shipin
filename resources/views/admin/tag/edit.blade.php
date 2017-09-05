@extends('public.father')

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="/admin/tag">标签列表</a></li>
        <li class="active"><a href="/admin/tag/create">添加/修改标签</a></li>
    </ul>
        {{--因为是资源控制器 只有一个路由！里面有正删改查的自动方法！所以这里修改了之后，会把修改的哪条参数 给传进update这个方法  是自动的哟--}}
    <form action="/admin/tag/{{$data['id']}}" method="post" role="form" class="form-horizontal">
        {{csrf_field()}}{{--这是令牌--}}
        {{ method_field('PUT') }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改标签</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标签</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$data['name']}}">
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
@endsection