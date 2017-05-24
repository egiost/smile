<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<meta name="keywords" content="登录">
	<meta name="content" content="登录">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="./public/login/css/login.css">
    <script type="text/javascript" src="./public/login/js/jquery.js"></script>
</head>
<body class="login_bj" >
<div class="zhuce_body">
	<div class="logo"><!-- <img src="" width="114" height="54" border="0"> --></div>
    <div class="zhuce_kong login_kuang">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>登录</h3>
       	  	  <form action="" method="post">
                <input name="username" type="text" class="kuang_txt" placeholder="用户名/手机号/邮箱" value="楪祈">
                <input name="password" type="password" class="kuang_txt" placeholder="密码" value="admin123">
                <input name="_csrf-frontend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>" >
                <div>
               		<a href="#">忘记密码？</a><input name="check" type="checkbox" value="1" ><span>记住我</span>
                </div>
                <input type="submit" class="btn_zhuce" value="登录">
                </form>
            </div>
        	<div class="bj_right">
            	<p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ</a>
<!--                <a href="#" class="zhuce_wb">微博</a>-->
<!--                <a href="#" class="zhuce_wx">微信</a>-->
                <p>没有账号？<a href="?r=login/register">立即注册</a></p>

            </div>
        </div>
        <P></P>
    </div>

</div>
<?=$background?>
</body>
</html>