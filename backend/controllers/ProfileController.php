<?php

namespace backend\controllers;

use common\models\PasswordForm;
use common\models\User;
use frontend\models\SignupForm;
use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Profile();
        $signup = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {


            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->img != null) {
                $newname = time() . '_ostad' . '.' . $model->img->extension;
                $model->img->saveAs(Yii::getAlias('@upload') . '/' . $newname);
                $model->img = $newname;
            }
            if ($signup->load(Yii::$app->request->post())) {

                $signup->name = $model->name;
                $signup->tell = $model->tell;

                if ($signup->signup()) {

                    $u = User::findByUsername($signup->username);
                    $model->id_user = $u->id;
                    $model->role='ostad';

                   if ($model->save(0)){
                       return $this->redirect(['view', 'id' => $model->id]);

                   }else{
                       return $model;
                   }

                }
            }


        }

        return $this->render('create', [
            'model' => $model,
            'signup' => $signup,
        ]);
    }



    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
