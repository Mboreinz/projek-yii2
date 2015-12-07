<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class UserController extends Controller{
    public function actionIndex(){
        $this->layout = false;
        return $this->render('hello');
    }

    public function actionHello(){
        return $this->render('hello');
    }

}
