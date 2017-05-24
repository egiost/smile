<?php
namespace frontend\controllers;

use Yii;

/**
 * 留言板
 * Messagecontroller
 */
class MessageController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
