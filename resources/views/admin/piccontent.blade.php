<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户首页</title>
</head>
<body>


@foreach($res as $value)
    <h3 style="text-align: center">{{$value->title}}</h3>
<table>
    <tr>


    </tr>

    <tr>
        <td><img src="/uploads/{{$value->pathname}}"/></td>
    </tr>
    <tr>
        <td>{{$value->content}}</td>
    </tr>

</table>
@endforeach
</body>
</html>