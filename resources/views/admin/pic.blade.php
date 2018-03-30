@extends('layout')
@section('content')

<div class="container" style="padding-top: 2em;">
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/editshow" class=" btn btn-primary" style="text-align: center">添加日志</a>
        </div>
    </div>
</div>
<div class="container">
<table class="table table-striped">
    <thead>
    <tr>
        <th>编号</th>
        <th>标题</th>
        <th>图片展示</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $value)
    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->title}}</td>
        <td><img width="30" class="img-thumbnail" src="/uploads/{{$value->pathname}}"></td>
        <td>
            <a href="/admin/piccontent/{{$value->id}}">详情</a>|
            <a href="/admin/picdelete/{{$value->id}}">删除</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

@stop