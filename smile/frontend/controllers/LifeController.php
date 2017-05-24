<?php
namespace frontend\controllers;

use Yii;

/**
 * 慢生活
 * Life controller
 */
class LifeController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}