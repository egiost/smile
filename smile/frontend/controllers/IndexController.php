<?php
namespace frontend\controllers;

use Yii;

/**
 * Index controller
 */
class IndexController extends CommonController
{
    /**
     * 网站首页
     * @return string
     */
    public function actionIndex()
    {
        $background = $this->actionBackground();
        return $this->render('index',[
            'background'=>$background,
        ]);
    }

    /**
     * 关于我
     * @return string
     */
    public function actionAbout()
    {
        $background = $this->actionBackground();
        return $this->render('about',[
            'background'=>$background,
        ]);
    }


}