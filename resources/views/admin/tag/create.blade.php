@extends('public.father')

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="/admin/tag">标签列表</a></li>{{--这个找的是哪个--}}
        <li class="active"><a href="/admin/tag/create">添加标签</a></li>  {{--这个找的是模板--}}
    </ul>
                {{--提交是给tag 模型的--}}
    <form action="/admin/tag" method="post" role="form" class="form-horizontal">
        {{csrf_field()}} {{--都要给令牌？？才行--}}

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">添加标签</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标签</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required="required">
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
@endsection