<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>欢迎来到我的个人博客</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="神秘、俏皮。" />
    <link href="./public/css/base.css" rel="stylesheet">
    <link href="./public/css/index.css" rel="stylesheet">
    <link href="./public/css/media.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <script src="./public/js/modernizr.js"></script>
    <![endif]-->
</head>
<body>
<div class="ibody">
    <header>
        <h1>朝闻道，夕死可矣</h1>
        <h2>博学之，审问之， 慎思之，明辨之，笃行之。</h2>
        <? if(Yii::$app->session->get('user')){ ?>
        <div class="logo"><a href="http:\\www.zyjfire.top"></a></div>
        <? } else { ?>
        <div class="logo"><a href="?r=login/index"></a></div>
        <? } ?>
        <nav id="topnav"><a href="?r=index/index">首页</a><a href="?r=index/about">关于我</a><a href="?r=life/index">慢生活</a><a href="?r=gossip/index">闲言碎语</a><a href="?r=technology/index">技术探讨</a><a href="?r=images/index">我的相册</a><a href="?r=messageboard/index">留言板</a></nav>
    </header>
    <article>
        <div class="banner">
            <ul class="texts">
                <p>I am a slow walker,but I never walk backwards.</p>
                <p>我走得很慢,但是我从来不会后退.</p>
            </ul>
        </div>
        <div class="bloglist">
            <h2>
                <p><span>足迹</span></p>
            </h2>
            <!-- 文章 begin-->
            <div class="blogs">
                <h3><a href="/">犯错了怎么办？</a></h3>
                <figure><img src="./public/images/01.jpg" ></figure>
                <ul>
                    <p>看到昔日好友发了一篇日志《咎由自取》他说他是一个悲观者，感觉社会抛弃了他，脾气、性格在6年的时间里变化很大，很难适应这个社会。人生其实就是不断犯错的过程，在这个过程中不断的犯错，不断的吸取教训，不断的成长。也许日子里的惊涛骇浪，不过是人生中的水花摇晃，别用显微镜放大你的悲伤。</p>
                    <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
                </ul>
                <p class="autor"><span>作者：</span><span>分类：【<a href="/">日记</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
                <div class="dateview">2014-04-08</div>
            </div>
            <!--文章 end-->
        </div>
    </article>
    <aside>
        <div class="avatar">
            <? $user = Yii::$app->session->get('user'); if ($user){?>
            <a href="?r=personal/index"><span><?= $user['username']?></span></a>
            <? } else { ?>
            <a href="?r=login/index"><span>遇见</span></a>
            <? } ?>
        </div>
        <div class="topspaceinfo">
            <h1>While there is life there is hope.</h1>
            <p>冬之城大魔法师梅林: <br>能将此剑拔出岩石之勇士,即是将成为不列颠之王之人,阿尔托莉娅啊,于拔剑前,请尚再仔细考虑,一旦获得此剑,汝将不再可为人类...<br>Saber:<br>吾明解,吾愿即为求剑而来.</p>
        </div>
        <div class="about_c">
            <p>网名：遇见</p>
            <p>职业：PHP </p>
            <p>籍贯：山西吕梁</p>
            <p>电话：183********</p>
            <p>邮箱：zyjfire@foxmail.com</p>
        </div>
        <div class="tj_news">
            <h2>
                <p class="tj_t1">最新文章</p>
            </h2>
            <ul>
                <li><a href="/">犯错了怎么办？</a></li>
                <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
                <li><a href="/">春暖花开-走走停停-发现美</a></li>
                <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
                <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
                <li><a href="/">简单手工纸玫瑰</a></li>
                <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
                <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
            </ul>
            <h2>
                <p class="tj_t2">推荐文章</p>
            </h2>
            <ul>
                <li><a href="/">犯错了怎么办？</a></li>
                <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
                <li><a href="/">春暖花开-走走停停-发现美</a></li>
                <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
                <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
                <li><a href="/">简单手工纸玫瑰</a></li>
                <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
                <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
            </ul>
        </div>
        <div class="links">
            <h2>
                <p>友情链接</p>
            </h2>
            <ul>
                <li><a href="http://www.cnblogs.com/zyjfire/" target="_blank">zyj的cnblog博客</a></li>
                <li><a href="http://weibo.com/zyj9513" target="_blank">zyj的个人微博</a></li>
                <li><a href="https://www.zhihu.com/people/ye-qi-8-5/activities" target="_blank">zyj的知乎</a></li>
                <li><a href="https://www.zhihu.com/people/ye-qi-8-5/activities" target="_blank" title="网站的源代码都在上边哦">zyj的GitHub</a></li>
            </ul>
        </div>
        <div class="copyright">
            <ul>
                <p> Design by <a href="?r=index/about">zyj</a></p>
                <p>晋ICP备17003848号-1</p>
                </p>
            </ul>
        </div>
    </aside>
    <script src="./public/js/silder.js"></script>
    <div class="clear"></div>
    <!-- 清除浮动 -->
</div>
<?= $background?>
</body>
</html>
