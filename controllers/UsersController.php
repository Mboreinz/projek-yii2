<?php
    namespace app\controllers;

    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use app\models\Users;
    use yii\filters\AccessControl;
    use yii\web\NotFoundHttpException;

    class UsersController extends Controller{

        public function behaviors(){
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['create', 'update'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
                    ]
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],
            ];
        }

//        public function actionIndex(){
//           $searchModel = new Users();
//           $dataProvider = $searchModel -> search(\Yii::$app->request->queryParams);
//
//           return $this->render('index', [
//              'searchModel' => $searchModel,
//              'dataProvider' => $dataProvider,
//           ]);
//        }

        public function actionView($id){
            return $this->render('view',[
                'model' => $this -> findModel($id),
            ]);
        }

        public function actionCreate(){
            $model = new Users();

            if($model->load(\Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['view', 'id' => $model->id_pegawai]);
            }else{
                return $this->render('create',[
                    'model' => $model,
                ]);
            }
        }

        public function actionUpdate($id){
            $model = $this->findModel($id);
            if($model->load(\Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['view', 'id' => $model->id_pegawai]);
            }else{
                return $this->render('update',[
                    'model' => $model,
                ]);
            }
        }

        public function actionDelete($id){
            $this->findModel($id)->delete();
            return $this->redirect('index');
        }

        public function findModel($id){
            if(($model = Users::findOne($id)) != null){
                return $model;
            }else{
                throw new NotFoundHttpException('gak iso bos, ojo dipekso');
            }
        }
    }
?>