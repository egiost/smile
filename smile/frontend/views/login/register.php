<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<meta name="keywords" content="注册">
	<meta name="content" content="登录">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="./public/login/css/login.css">
    <script type="text/javascript" src="./public/login/js/jquery.min.js"></script>

</head>
<body class="login_bj" >

<div class="zhuce_body">
	<div class="logo"><!--<img src="" width="114" height="54" border="0">--></div>
    <div class="zhuce_kong">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>欢迎注册</h3>
       	  	  <form action="" method="post">
                <input name="username" type="text" id="my_username" class="kuang_txt phone" placeholder="用户名">
                <input name="mobile" type="text" id="my_mobile" class="kuang_txt phone" placeholder="手机号">
                <input name="email" type="text" id="my_email" class="kuang_txt email" placeholder="邮箱">
                <input name="password" type="password" id="my_password" class="kuang_txt possword" placeholder="密码">
                <input name="pwd" type="password" id="my_pwd" class="kuang_txt yanzm" placeholder="请再次输入密码">
                <div style="height: 25px"><span id="text"></span></div>
                <div style="margin-top: 5px">
               		<input name="" type="checkbox" value="" checked><span>已阅读并同意<a href="javascript:void(0)" target="_blank"><span class="lan">《个人用户使用协议》</span></a></span>
                </div>
                <input type="submit" class="btn_zhuce" value="注册">
                  <input name="_csrf-frontend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>" >
                </form>
            </div>
            <img src="./public/images/cebian.gif" width="235px" height="" alt="">
        	<div class="bj_right" style="height: 92px">
                <!-- <a href="#" class="zhuce_qq">QQ</a>-->
                <!-- <a href="#" class="zhuce_wb">微博</a>-->
                <!-- <a href="#" class="zhuce_wx">微信</a>-->
                <p style="height: 30px">已有账号？<a href="?r=login/index">立即登录</a></p>
                <p style="height: 30px">晨曦时，梦见兮</p>
            </div>
        </div>
       <P></P>
    </div>

</div>
    
<div style="text-align:center;">
</div>
<?=$background?>
</body>
<script>
$(function(){
//    $("#my_username").blur(function(){
//
//    });
    $("#my_username").focus(function(){
        var html = '<font color="#ff332f">用户名最长8位，不可输入特殊字符<font>';
        $('#text').html(html);
    });
    $("#my_mobile").focus(function(){
        var html = '<font color="#ff332f">请输入您近期常用的手机号<font>';
        $('#text').html(html);
    });
    $("#my_email").focus(function(){
        var html = '<font color="#ff332f">请输入正确的邮箱<font>';
        $('#text').html(html);
    });
    $("#my_password").focus(function(){
        var html = '<font color="#ff332f">密码最长16位,最短6位<font>';
        $('#text').html(html);
    });
    $("#my_pwd").focus(function(){
        var html = '<font color="#ff332f">两次密码请保持一致<font>';
        $('#text').html(html);
    });
})
</script>
</html>