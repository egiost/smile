<?php
namespace frontend\controllers;

use Yii;

/**
 * 闲言碎语
 * Gossip controller
 */
class GossipController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}