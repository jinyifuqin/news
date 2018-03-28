<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户首页</title>
</head>
<body>
<h3>用户登录</h3>
<form action="/admin/picsave" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}
    标题：<input type="text" name="title"/><br/>
    图片：<input type="file" name="picname"/><br/>
    内容：<textarea name="content"></textarea>
    <input value="上传" type="submit">
</form>

<table>
    <tr>
        <td>编号</td>
        <td>标题</td>
        <td>图片展示</td>
        <td>操作</td>
    </tr>
    @foreach($data as $value)
    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->title}}</td>
        <td><img width="50" src="/uploads/{{$value->pathname}}"></td>
        <td>
            <a href="/admin/piccontent/{{$value->id}}">详情</a>|
            <a href="/admin/picdelete/{{$value->id}}">删除</a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>