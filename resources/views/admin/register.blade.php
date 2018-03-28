<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户首页</title>
</head>
<body>
    <h3>用户注册</h3>
    <form action="/admin/save" method="post">
        {{ csrf_field() }}
        用户名：<input type="text" name="username"/><br/>
        电子邮箱：<input type="email" name="email"/><br/>
        密码：<input type="password" name="psw"/><br/>
        <input value="登录" type="submit">
    </form>
</body>
</html>