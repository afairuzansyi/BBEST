<?php

namespace app\controllers;

use Yii;
use app\models\Nilai;
use app\models\NilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use app\models\NilaiPeserta;
use yii\filters\AccessControl;
use app\filters\AccessRule;

/**
 * NilaiController implements the CRUD actions for Nilai model.
 */
class NilaiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'actions'=>[
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                            'v',
                            'lap',
                        ],
                        'allow'=>true,
                        'matchCallback'=>function(){
                            return (
                                Yii::$app->user->identity->role->can_admin == 1
                            );
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nilai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NilaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nilai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nilai();
        $nilaiPeserta = new NilaiPeserta();
        //$peserta = new Profile;


        $loadPost = Yii::$app->request->post();
        if ($model->load($loadPost) && $model->save()) {
            $model->save(false);
            $nilaiPeserta->id_nilai = $model->id;
            $nilaiPeserta->id_peserta = $model->nama;
            $nilaiPeserta->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            Yii::$app->session->setFlash("Nilai-gagal", Yii::t("app", "Gagal Simpan"));
            return $this->render('create', [
                'model' => $model,
                'nilaiPeserta' => $nilaiPeserta,
                //'peserta' => $peserta,
            ]);
        }
    }


    ///aftaresave

    public function afterSave($insert)
    {
       $actualPesertas = [];
       $pesertaExists = 0; //for updates
     
       if (($actualPesertas = NilaiPeserta::find()
        ->andWhere("id_nilai = $this->id")
        ->asArray()
        ->all()) !== null) {
          $actualPesertas = ArrayHelper::getColumn($actualPesertas, 'id_peserta');
          $pesertaExists = 1; // if there is authors relations, we will work it latter
       }
     
       if (!empty($this->despIds)) { //save the relations
          foreach ($this->despIds as $id) {
             $actualPesertas = array_diff($actualPesertas, [$id]); //remove remaining authors from array
         $r = new NilaiPeserta();
         $r->id_nilai = $this->id;
         $r->id_peserta= $id;
         $r->save();
        }
       }
     
       if ($pesertaExists == 1) { //delete authors tha does not belong anymore to this book
        foreach ($actualPesertas as $remove) {
          $r = NilaiPeserta::findOne(['id_peserta' => $remove, 'id_nilai' => $this->id]);
          $r->delete();
        }
       }
     
       parent::afterSave($insert); //don't forget this
    }

    /**
     * Updates an existing Nilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->nama = $model->getPesertaIds(); //could it be automatically??
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nilai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        NilaiPeserta::deleteAll(['id_nilai' => $model->id]);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Nilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nilai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLap()
    {
        $model = new Nilai();
        return $this->render('form', [
            'model' => $model]);
    }

    public function actionV()
    {
        $pdf = new Pdf([
        'mode' => Pdf::MODE_BLANK, // leaner size using standard fonts
        'format' => Pdf::FORMAT_A4,
        'options' => [
            'title' => 'Laporan Nilai Peserta',
            'subject' => 'Laporan Nilai Peserta'
        ],
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        'methods' => [
            'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
        ]
    ]);
        $ta = Yii::$app->request->post();
        $model = new Nilai();

        $query = new Query();
        if ($model->load(Yii::$app->request->post())) {
        $query = $model::find()
            ->joinWith(['nilaiPeserta','idPddkn'])
            ->where(['tahun_ajaran' => $ta])
            ->orderBy('id_pddkn ASC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,     
            ]);
        $model = $dataProvider->getModels();

        $content =  $this->render('laporan', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);

        $mpdf = $pdf->api;
        $mpdf->WriteHtml($content);
        return $pdf->render();
        }

    }
}
