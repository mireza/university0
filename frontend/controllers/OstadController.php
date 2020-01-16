<?php

namespace frontend\controllers;


use common\models\AuthAssignment;
use common\models\Comment;
use common\models\CommentSearch;
use common\models\News;
use common\models\NewsSearch;
use common\models\Profile;
use common\models\Ticket;
use common\models\TicketSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * ostad controller
 */
class OstadController extends Controller
{
    public $layout = 'ostad.php';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */


    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionDetcomment($id)
    {
        $model=Comment::findOne($id);
        return $this->render('detcomment',['model'=>$model]);
    }



    public function actionDelcomment($id)
    {

        $model=Comment::findOne($id);
        $model->delete();
        return $this->redirect(['comment']);
    }

    public function actionEnablec($id)
    {

        $model=Comment::findOne($id);

        if ($model->published == 0){
            $model->published= 1 ;

        }else{
            $model->published= 0 ;

        }
        $model->save(0);
        return $this->redirect(['detcomment?id='.$id]);
    }



    public function actionNews()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('news', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }




    public function actionComment()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('comment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionCreatenews()
    {

        $model = new News();
        if ($model->load(Yii::$app->request->post())) {

            $model->id_user = Yii::$app->user->getId();
            $model->time = time();

            $model->save(0);
            return $this->redirect(['news']);
        }
        return $this->render('createnews', ['model' => $model]);

    }


    public function actionShowticket()
    {
        Yii::$app->params['title'] = "تیکت های من";
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->searchmyticket(Yii::$app->request->queryParams);

        return $this->render('showticket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDetailt($id)
    {
        $model = new Ticket();
        $userid = Yii::$app->user->getId();
        $tickets = ticket::find()->where(['parent_id' => $id])->orWhere(['id' => $id])->asArray()->all();

        $tick = ticket::find()->where(['parent_id' => $id])->orWhere(['id' => $id])->andWhere(['!=', 'sender_id', $userid])->all();
        foreach ($tick as $value) {
            if ($value->status == 1) {
                $value->status = 0;
                $value->save();
            }
        }
        return $this->render('detailt', ['tickets' => $tickets, 'ticketId' => $id, 'model' => $model]);
    }


    public function actionSaveresponse($receiverid, $parentid)
    {


        $model = new Ticket();

        if ($model->load(Yii::$app->request->post())) {
            $sender = Yii::$app->user->getId();
            $time = time();
            $model->sender_id = $sender;
            $model->receiver_id = $receiverid;
            $model->parent_id = $parentid;
            $model->time = $time;
            $model->status = 0;
        }
        if ($model->save()) {
            Yii::$app->getSession()->setFlash('success', 'پیغام ارسال شد');
            return $this->redirect(['detailt', 'id' => $model->parent_id]);
        } else {
            var_dump($model->errors);
            exit();

        }
    }


    public function actionCreateticket()
    {
        $model = new Ticket();
        $roleadmin = AuthAssignment::findOne(['user_id' => Yii::$app->user->getId()]);
        $ostad=ArrayHelper::map(Profile::find()->where(['role'=>'ostad'])->all() , 'id_user','name');


        if ($model->load(Yii::$app->request->post())) {

            $model->sender_id = Yii::$app->getUser()->id;
            $model->parent_id = 0;
            $model->time = time();
            $model->status = 0;
            $model->role = $roleadmin->item_name;

            $model->save(0);

            return $this->redirect(['showticket', 'id' => $model->id]);
        }
        return $this->render('createticket', [
            'model' => $model,
            'ostad' => $ostad,
        ]);
    }







}
