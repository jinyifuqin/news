<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户首页</title>
</head>
<body>
    <h3>用户登录</h3>
    <form action="/admin/login" method="post">
        {{ csrf_field() }}
        用户名：<input type="text" name="username"/><br/>
        密码：<input type="password" name="psw"/><br/>
        <input value="登录" type="submit">
    </form>
    <a href="/admin/register">用户注册</a>
</body>
</html>