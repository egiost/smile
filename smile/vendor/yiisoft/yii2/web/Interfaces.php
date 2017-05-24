<?php
namespace yii\web;

use Yii;

//电商ID
defined('EBusinessID') or define('EBusinessID', '1288559');
//电商加密私钥，快递鸟提供，注意保管，不要泄漏
defined('AppKey') or define('AppKey', '86950ece-8cc2-4e40-b780-16c311b6bd13');
//请求url
defined('ReqURL') or define('ReqURL', 'http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx');
class Interfaces
{
    public function background()
    {
        $str = '<div style="float:right;" id="github_iframe"></div>
                <script>
                    /**
                     * Copyright (c) 2016 hustcc
                     * License: MIT
                     * Version: %%GULP_INJECT_VERSION%%
                     * GitHub: https://github.com/hustcc/canvas-nest.js
                     **/
                    ! function() {
                        //封装方法，压缩之后减少文件大小
                        function get_attribute(node, attr, default_value) {
                            return node.getAttribute(attr) || default_value;
                        }
                        //封装方法，压缩之后减少文件大小
                        function get_by_tagname(name) {
                            return document.getElementsByTagName(name);
                        }
                        //获取配置参数
                        function get_config_option() {
                            var scripts = get_by_tagname("script"),
                                script_len = scripts.length,
                                script = scripts[script_len - 1]; //当前加载的script
                            return {
                                l: script_len, //长度，用于生成id用
                                z: get_attribute(script, "zIndex", -1), //z-index
                                o: get_attribute(script, "opacity", 0.5), //opacity
                                c: get_attribute(script, "color", "0,0,0"), //color
                                n: get_attribute(script, "count", 99) //count
                            };
                        }
                        //设置canvas的高宽
                        function set_canvas_size() {
                            canvas_width = the_canvas.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                                canvas_height = the_canvas.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                        }
                
                        //绘制过程
                        function draw_canvas() {
                            context.clearRect(0, 0, canvas_width, canvas_height);
                            //随机的线条和当前位置联合数组
                            var e, i, d, x_dist, y_dist, dist; //临时节点
                            //遍历处理每一个点
                            random_points.forEach(function(r, idx) {
                                r.x += r.xa,
                                    r.y += r.ya, //移动
                                    r.xa *= r.x > canvas_width || r.x < 0 ? -1 : 1,
                                    r.ya *= r.y > canvas_height || r.y < 0 ? -1 : 1, //碰到边界，反向反弹
                                    context.fillRect(r.x - 0.5, r.y - 0.5, 1, 1); //绘制一个宽高为1的点
                                //从下一个点开始
                                for (i = idx + 1; i < all_array.length; i++) {
                                    e = all_array[i];
                                    // 当前点存在
                                    if (null !== e.x && null !== e.y) {
                                        x_dist = r.x - e.x; //x轴距离 l
                                        y_dist = r.y - e.y; //y轴距离 n
                                        dist = x_dist * x_dist + y_dist * y_dist; //总距离, m
                
                                        dist < e.max && (e === current_point && dist >= e.max / 2 && (r.x -= 0.03 * x_dist, r.y -= 0.03 * y_dist), //靠近的时候加速
                                            d = (e.max - dist) / e.max,
                                            context.beginPath(),
                                            context.lineWidth = d / 2,
                                            context.strokeStyle = "rgba(" + config.c + "," + (d + 0.2) + ")",
                                            context.moveTo(r.x, r.y),
                                            context.lineTo(e.x, e.y),
                                            context.stroke());
                                    }
                                }
                            }), frame_func(draw_canvas);
                        }
                        //创建画布，并添加到body中
                        var the_canvas = document.createElement("canvas"), //画布
                            config = get_config_option(), //配置
                            canvas_id = "c_n" + config.l, //canvas id
                            context = the_canvas.getContext("2d"), canvas_width, canvas_height,
                            frame_func = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(func) {
                                    window.setTimeout(func, 1000 / 45);
                                }, random = Math.random,
                            current_point = {
                                x: null, //当前鼠标x
                                y: null, //当前鼠标y
                                max: 20000 // 圈半径的平方
                            },
                            all_array;
                        the_canvas.id = canvas_id;
                        the_canvas.style.cssText = "position:fixed;top:0;left:0;z-index:" + config.z + ";opacity:" + config.o;
                        get_by_tagname("body")[0].appendChild(the_canvas);
                
                        //初始化画布大小
                        set_canvas_size();
                        window.onresize = set_canvas_size;
                        //当时鼠标位置存储，离开的时候，释放当前位置信息
                        window.onmousemove = function(e) {
                            e = e || window.event;
                            current_point.x = e.clientX;
                            current_point.y = e.clientY;
                        }, window.onmouseout = function() {
                            current_point.x = null;
                            current_point.y = null;
                        };
                        //随机生成config.n条线位置信息
                        for (var random_points = [], i = 0; config.n > i; i++) {
                            var x = random() * canvas_width, //随机位置
                                y = random() * canvas_height,
                                xa = 2 * random() - 1, //随机运动方向
                                ya = 2 * random() - 1;
                            // 随机点
                            random_points.push({
                                x: x,
                                y: y,
                                xa: xa,
                                ya: ya,
                                max: 6000 //沾附距离
                            });
                        }
                        all_array = random_points.concat([current_point]);
                        //0.1秒后绘制
                        setTimeout(function() {
                            draw_canvas();
                        }, 100);
                    }();
                </script>';
            return $str;
    }

    /**
     * 天气接口
     * @param $address
     * @return bool|string
     */
    public function weather($address)
    {
        $weather = file_get_contents('http://api.k780.com/?app=weather.future&weaid='.$address.'&&appkey=22582&sign=a46de411aede1995a55b4e0f9abe21f1&format=json');
        return json_decode($weather,true);
    }

    /**
     * 翻译接口
     * @param $word
     * @return bool|string
     */
    public function translate($word)
    {
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$word)) {
            $to = 'en';
        } else {
            $to = 'zh';
        }
        $appid = '20170116000035956';
        $salt = mt_rand(0,1000);
        $mi = 'hu25_In7Pp5Ma3YneG0b';
        $sign = md5($appid.$word.$salt.$mi);
        $words = file_get_contents('http://api.fanyi.baidu.com/api/trans/vip/translate?q='.$word.'&from=auto&to='.$to.'&appid='.$appid.'&salt='.$salt.'&sign='.$sign);
//        $words = explode(',',$words);
//        foreach ($words as $k => $v){
//            $words[$k] = explode(':',$v);
//        }
        return json_decode($words);
    }

    /**
     * 老黄历接口
     * @param $date
     * @return bool|string
     */
    public function calendar($date)
    {
        $showapi_appid = '38225';  //替换此值,在官网的"我的应用"中找到相关值
        $showapi_secret = '8ab9201f7eac4589bcfcf9b7f7d4f4ca';  //替换此值,在官网的"我的应用"中找到相关值
        $paramArr = array(
            'showapi_appid'=> $showapi_appid,
            'date'=> $date,
            //添加其他参数
        );

        //创建参数(包括签名的处理)
        function createParam ($paramArr,$showapi_secret) {
            $paraStr = "";
            $signStr = "";
            ksort($paramArr);
            foreach ($paramArr as $key => $val) {
                if ($key != '' && $val != '') {
                    $signStr .= $key.$val;
                    $paraStr .= $key.'='.urlencode($val).'&';
                }
            }
            $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
            $sign = strtolower(md5($signStr));
            $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
            return $paraStr;
        }

        $param = createParam($paramArr,$showapi_secret);
        $url = 'http://route.showapi.com/856-1?'.$param;
        $result = file_get_contents($url);
        return json_decode($result);
    }

    /**
     * 新闻接口
     * @return bool|string
     */
    public function news()
    {
        $news = file_get_contents('http://api.avatardata.cn/ActNews/LookUp?key=daafca272b9d4dc1af6e04255ce3d4bc');
        return json_decode($news);
    }

    /**
     * 快递单号查询接口
     * @return url响应返回的html
     */
    public function express($company,$numbers)
    {
        //调用查询物流轨迹
        $logisticResult = $this->getOrderTracesByJson($company,$numbers);
        return json_decode($logisticResult);
    }


    /**
     * Json方式 查询订单物流轨迹
     */
    public function getOrderTracesByJson($company,$numbers){
        $requestData= "{'OrderCode':'','ShipperCode':'$company','LogisticCode':'$numbers'}";
        $datas = array(
            'EBusinessID' => EBusinessID,
            'RequestType' => '1002',
            'RequestData' => urlencode($requestData) ,
            'DataType' => '2',
        );
        $datas['DataSign'] = $this->encrypt($requestData, AppKey);
        $result = $this->sendPost(ReqURL, $datas);
        //根据公司业务处理返回的信息......
        return $result;
    }

    /**
     *  post提交数据
     * @param  string $url 请求Url
     * @param  array $datas 提交的数据
     * @return url响应返回的html
     */
    public function sendPost($url, $datas) {
        $temps = array();
        foreach ($datas as $key => $value) {
            $temps[] = sprintf('%s=%s', $key, $value);
        }
        $post_data = implode('&', $temps);
        $url_info = parse_url($url);
        if(empty($url_info['port']))
        {
            $url_info['port']=80;
        }
        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader.= "Host:" . $url_info['host'] . "\r\n";
        $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
        $httpheader.= "Connection:close\r\n\r\n";
        $httpheader.= $post_data;
        $fd = fsockopen($url_info['host'], $url_info['port']);
        fwrite($fd, $httpheader);
        $gets = "";
        $headerFlag = true;
        while (!feof($fd)) {
            if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
                break;
            }
        }
        while (!feof($fd)) {
            $gets.= fread($fd, 128);
        }
        fclose($fd);
        return $gets;
    }

    /**
     * 电商Sign签名生成
     * @param data 内容
     * @param appkey Appkey
     * @return DataSign签名
     */
    public function encrypt($data, $appkey) {
        return urlencode(base64_encode(md5($data.$appkey)));
    }

}