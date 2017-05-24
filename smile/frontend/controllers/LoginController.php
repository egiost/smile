<?php
namespace frontend\controllers;

use frontend\models\MyUser;
use Yii;

/**
 * 登录控制器
 * Login controller
 */
class LoginController extends CommonController
{
    public function actionIndex()
    {
        /**
         * 登录 及 登录验证
         */
        if (yii::$app->request->isPost){
            $post = yii::$app->request->post();
            //xss验证
            $xss[] = $post['username'];
            if ($this->actionXss($xss) == danger){
                return $this->redirect(['common/error','请勿输入危险字符','?r=login/index','3']);
            }
            //正则匹配 用户名，手机号，邮箱
            switch(true)
            {
                case preg_match("/^1[34578]{1}\d{9}$/",$post['username']):
                    $where = 'mobile';
                    break;
                case preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])*(\.([a-z0-9])([-a-z0-9_-])([a-z0-9])+)*$/i",$post['username']):
                    $where = 'email';
                    break;
                default:
                    $where = 'username';
            }
            //查询用户
            $userModel = new MyUser();
            $password = $this->actionPassword($post['password']);
            $user = $userModel->login($where, $post['username'], $password);
            if ($user){
                //记住账号 把相关信息存入cookie
                if (isset($post['check'])){
                    $cookies = Yii::$app->response->cookies;
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'check',
                        'value' => $post['username'],
                        //'expire'=>time()+3600*24,
                    ]));
                }
                //登陆成功，修改信息
                $arr['final_ip'] = $_SERVER['REMOTE_ADDR'];
                $arr['final_time'] = date('Y-m-d H:i:s',time());
                $userModel->loginDO($arr, $user['id']);
                //存入session
                yii::$app->session['user'] = $user;
                //跳转
                return $this->redirect(['common/success','欢迎您，亲爱的'.$user['username'],'?r=index/index','3']);
            } else {
                //登陆失败
                return $this->redirect(['common/error','用户名或密码错误','?r=index/index','3']);
            }
        } else {
            $background = $this->actionBackground();
            return $this->render('index',[
                'background'=>$background,
            ]);
        }
    }

    public function actionRegister()
    {
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            //xss验证
            $xss = [$post['username'], $post['mobile'], $post['email']];
            if ($this->actionXss($xss) == danger){
                return $this->redirect(['common/error', '请勿输入危险字符', '?r=login/register', '3']);
            }
            //检测两次密码是否相等
            if ($post['password'] == '' || $post['password'] == '' || $post['password'] != $post['pwd'] || mb_strlen($post['password']) < 6){
                return $this->redirect(['common/error','密码错误', '?r=login/register', '3']);
            }
            //验证用户名
            if ($post['username'] == '' || mb_strlen($post['username']) > 8 ){
                return $this->redirect(['common/error', '用户名错误', '?r=login/register', '3']);
            }
            //验证邮箱
            if ($post['email'] == '' || !preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])*(\.([a-z0-9])([-a-z0-9_-])([a-z0-9])+)*$/i", $post['email'])){
                return $this->redirect(['common/error', '邮箱错误', '?r=login/register', '3']);
            }
            //验证手机号
            if ($post['mobile'] == '' || !preg_match("/^1[34578]{1}\d{9}$/", $post['mobile'])){
                return $this->redirect(['common/error', '手机号错误', '?r=login/register', '3']);
            }
            //唯一性验证
            $userModel = new MyUser();
            $mobile = $userModel->Only('mobile',$post['mobile']);
            $email = $userModel->Only('email',$post['email']);
            $username = $userModel->Only('username',$post['username']);
            if($mobile || $email || $username){
                switch (true){
                    case $mobile != []:
                        $condition = '手机号已注册';
                        break;
                    case $email != []:
                        $condition = '邮箱已注册';
                        break;
                    case $username != []:
                        $condition = '用户名已注册';
                        break;
                    default:
                        $condition = '未知错误';
                }
                return $this->redirect(['common/error', $condition, '?r=login/register', '3']);
            }
            //执行注册
            $data = [
                'username'=>$post['username'],
                'password'=>$this->actionPassword($post['password']),
                'email'=>$post['email'],
                'mobile'=>$post['mobile'],
                'final_ip'=>$_SERVER['REMOTE_ADDR'],
                'final_time'=>date('Y-m-d H:i:s',time()),
            ];
            $res = $userModel->register($data);
            if ($res){
                $data['sex'] = '0';
                //存入session
                yii::$app->session['user'] = $data;
                //跳转
                return $this->redirect(['common/success','欢迎您，亲爱的'.$data['username'],'?r=index/index','3']);
            } else {
                return $this->redirect(['common/success','注册失败，请您再次尝试，如发生错误，请联系管理员','?r=login/register','3']);
            }
        } else {
            $background = $this->actionBackground();
            return $this->render('register',[
                'background'=>$background,
            ]);
        }
    }
}