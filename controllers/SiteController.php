<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\controllers\KategoriController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\KontakForm;
use app\models\blog\Post;
use app\models\blog\Kategori;
use app\models\blog\Comment;
use yii\data\Pagination;
use app\models\blog\PostSearch;
use app\models\blog\KategoriSearch;
use app\models\blog\CommentSearch;
use yii\data\ActiveDataProvider;

use amnah\yii2\user\models\User;


class SiteController extends Controller
{

    
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

    


    ///// BLOG ////
    public function actionIndex()
    {
        $query = Post::find()
                ->where(['status' => 1])
                ->orderBy('id DESC');
        $countPages = $query->count();
        $pages = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $countPages]);
        $posts = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $categories = Kategori::find()
                ->orderBy('nama ASC')
                ->all();
                return $this->render('index', [
                    'posts' => $posts,
                    'categories' => $categories,
                    'pages' => $pages,
        ]);
    }

    public function actionPostCategory($id)
    {
        $query = Post::find()
                ->where(['status' => 1, 'Kategori_id' => $id])
                ->orderBy('id DESC');
        $countPages = $query->count();
        $pages = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $countPages]);
        $posts = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $categories = Kategori::find()
                ->orderBy('id ASC')
                ->all();
        return $this->render('postCategory', [
                'posts' => $posts,
                'categories' => $categories,
                'pages' => $pages,
        ]);
    }

    //function single post,comment, post by category

    public function actionPostSingle($id)
    {
        
        $post = Post::find()
        ->where(['status' => 1, 'id' => $id])
        ->one();
        $categories = Kategori::find()
        ->orderBy('nama ASC')
        ->all();
        $comments = Comment::find()
        ->where(['status'=>1, 'post_id' => $id])
        ->orderBy('id DESC')
        ->all();

        $model = new Comment();

            if (!Yii::$app->user->isGuest){
                $model->author=Yii::$app->user->identity->username;
                $model->email=Yii::$app->user->identity->email;
                $model->status=1;
            }

            if ($model->load(Yii::$app->request->post())) {
                $model->post_id=$id;
                $model->status=0;
                $model->create_time=time();

            if ($model->validate()) {
                if($model->save()){
                    if($model->status == 1){
                        Yii::$app->session->setFlash('success', 'Komenter Tesrimpan');
                    }
                    else{
                       Yii::$app->session->setFlash('success', 'Komentar Disimpan, Menunggu Persetujuan Admin');
                    }
                }
            }
        }

        return $this->render('postSingle', [
        'post' => $post,
        'categories' => $categories,
        'comments' => $comments,
        'model' => $model,
        
        ]);
    }   

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionKontak()
    {
        $model = new KontakForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('kontak', [
            'model' => $model,
        ]);
    }

    public function actionTentang()
    {
        return $this->render('tentang');
    }
}
