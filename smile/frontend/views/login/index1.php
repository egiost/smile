<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎您的到来</title>
    <!--- CSS --->
    <link rel="stylesheet" href="./public/login/stylelogin2.css" type="text/css" />
    <link href="./public/login/slide-unlock.css" rel="stylesheet">
    <style>
        html, body, h1 {
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #393939;
            color: #d5d4ff;
            overflow: hidden
        }
        #demo {
            width: 600px;
            margin: 150px auto;
            padding: 10px;
            border: 1px dashed #d5d4ff;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            text-align: left;
        }

    </style>
</head>

<body>
<div id="container">
    <form action="?r=login/index" method="post">
<!--    <form>-->
        <div class="login">LOGIN</div>
        <div class="username-text">Username:</div>
        <div class="password-text">Password:</div>
        <div class="username-field">
            <input type="text" name="username" id="username" value="楪祈" />
        </div>
        <div class="password-field">
            <input type="password" name="password" id="password" value="admin123" />
        </div>
        <input type="checkbox" name="remember-me" id="remember-me" /><label for="remember-me">记住账号</label>
        <div class="forgot-usr-pwd"> 没账号? 请<a href="?r=login/register">注册</a></div>
        <input type="button" id="submit" class="login" value="GO" />
    </form>
    <input type="hidden" name="_csrf" id="csrf" value='<?= Yii::$app->request->csrfToken ?>'>
</div>
<div id="demo" >
    <div id="slider">
        <div id="slider_bg"></div>
        <span id="label">>></span> <span id="labelTip">拖动滑块验证</span> </div>
    <script src="./public/login/loginsss.js"></script>
    <script src="./public/login/jquery.slideunlock.js"></script>
    <script>
        $(function () {
            var slider = new SliderUnlock("#slider",{
                successLabelTip : "欢迎访问我的个人博客"
            },function(){
                var username = $("#username").val();
                var password = $("#password").val();
                var csrf = $('#csrf').val();
                $.ajax({
                    type: "POST",
                    url: "?r=login/index",
                    data: "username="+username+"&password="+password+"&_csrf-frontend="+csrf,
                    success: function(msg){
                        switch (true){
                            case msg == 100:
                                alert("登陆成功");
                                location.href="?r=index/index";
                                break;
                            case msg == 109:
                                alert("不可包含特殊字符");
                                location.href="?r=login/index";
                                break;
                            default:
                                alert("用户名或密码错误");
                                location.href="?r=login/index"
                        }
                    }
                });
            });
            slider.init();
        });

    </script>
</div>
<div style="float:right;" id="github_iframe"></div>
<?= $background?>
</body>
<script>

$(function(){
    $("#submit").click(function(){
        $("#container").css('display','none');
    })
})


</script>
</html>
