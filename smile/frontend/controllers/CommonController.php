<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

define('danger',109);//危险
define('NotLoggedIn',108);//未登录
define('FAIL',107);//失败
define('safety',102);//安全
define('LoggedIn',101);//已登录
define('SUCCESS',100);//成功

/**
 * Common controller
 */
class CommonController extends Controller
{
    public $layout = false;

    /**
     * 登陆检测
     * @return int
     */
    public function actionLoginChange()
    {
        if (Yii::$app->session->get('user')){
            return LoggedIn;
        } else {
            return NotLoggedIn;
        }
    }

    /**
     * 成功跳转提示
     * @param $str
     * @param $url
     * @param $time
     * @return string
     */
    public function actionSuccess()
    {
        $get = Yii::$app->request->get();
        return $this->render('success',[
            'str'=>$get[1],
            'url'=>$get[2],
            'time'=>$get[3],
        ]);
    }

    /**
     * 失败及错误跳转提示
     * @param $str
     * @param $url
     * @param $time
     * @return string
     */
    public function actionError()
    {
        $get = Yii::$app->request->get();
        return $this->render('error',[
            'str'=>$get[1],
            'url'=>$get[2],
            'time'=>$get[3],
        ]);
    }

    /**
     * 密码加密
     * @param $password
     * @return bool|string
     */
    public function actionPassword($password)
    {
        return substr(base_convert(md5($password),16,10),0,15);
    }

    /**
     * 背景页调用
     * @return string
     */
    public function actionBackground()
    {
        $interfaces = new \yii\web\Interfaces();
        return $interfaces->background();
    }

    /**
     * XSS攻击验证
     * @param $xss
     * @return int
     */
    public function actionXss($xss)
    {
        foreach ($xss as $k => $v){
            if (preg_match("/[\':;`%^&)(<>{}]|\]|\[|\/|\\\|\"|\|/",$v)){
                return danger;
            }
        }
        return safety;
    }

    public function actionTest()
    {
        echo $this->actionPassword('admin123');
    }
}