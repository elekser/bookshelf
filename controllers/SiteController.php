<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Books;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
/*
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
*/
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
     * Displays book list with sort (default authorFamily).
     *
     * @return string
     */
    public function actionIndex()
    {
	$provider = new ActiveDataProvider([
    		'query' => Books::find(),
    		'pagination' => ['pageSize' => 5,],
		'sort' => [ 'defaultOrder' => [ 'authorFamily' =>  SORT_ASC ] ]
	]);

        $pagination = new Pagination([
		'defaultPageSize' => 5,
		'totalCount' => $provider->TotalCount,
        ]);

        return $this->render('index', [
		'bookshelf' => $provider,
		'pagination' => $pagination,
        ]);
    }

    /**
     * Show book info.
     *
     * @return string
     */
    public function actionShowBook($id)
    {
        return $this->render('showbook',[ 'model' => Books::findOne($id)]);
    }

    /**
     * Add book in catalog.
     *
     * @return string
     */
    public function actionAddBook()
    {
	$model = new Books;
	if ( $model->load(Yii::$app->request->post()) and $model->validate() ) {
		$model->save();
		return Yii::$app->runAction('site/index');
	} else {
        	return $this->render('addbook',[ 'model' => new Books ]);
	}    
    }
}
