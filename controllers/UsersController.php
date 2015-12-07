<?php
    namespace app\controllers;

    use yii\web\Controller;
    use app\models\Users;

    class UsersController extends Controller{

        public function actionIndex(){
            if (!\Yii::$app->user->isGuest) {
                $users = Users::find()->all();
                return $this->render('index', ['users'=>$users]);
            }

            return $this->render('hello');
        }

    }
?>