<?php
namespace frontend\controllers;

use Yii;

/**
 * 技术探讨
 * Technology controller
 */
class TechnologyController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}