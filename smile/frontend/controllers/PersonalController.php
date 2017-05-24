<?php
namespace frontend\controllers;

use Yii;

/**
 * 个人中心
 * Personal controller
 */
class PersonalController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}