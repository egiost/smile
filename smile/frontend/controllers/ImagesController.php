<?php
namespace frontend\controllers;

use Yii;

/**
 * 我的相册
 * Images controller
 */
class ImagesController extends CommonController
{
    public function beforeAction($action)
    {
        if ($this->actionLoginChange() == NotLoggedIn) {
            return $this->redirect(['common/error', '啊哦，您还未登陆，请先登录', '?r=login/index', '3']);
        }
    }

    public function actionIndex()
    {
        $background = $this->actionBackground();
        return $this->render('index',[
            'background'=>$background,
        ]);
    }
}