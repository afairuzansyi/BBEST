<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AmbilBeasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pengambilan Beasiswa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambil-beasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        'code_trans',
        'tgl',
        [
            'attribute' => 'id_peserta',
            'format' => 'raw',
            'label' => 'Nama Peserta',
            'value' =>'idPeserta.nama_lengkap',
        ],
/*        [
            'attribute' => 'no_rekening',
            'format' => 'raw',
            'label' => 'No Rek',
            'value' => 'noRekening.no_rekening',
        ],*/
        [
            'attribute' => 'id_pddkn',
            'format' => 'raw',
            'label' => 'Pendidikan',
            'value' =>'idPddkn.pendidikan',
        ],
        [
            'attribute' => 'beasiswa',
            'format' => 'raw',
            'label' => 'Beasiswa',
            'value' =>'beasiswa0.jumlah_bea',
        ],
        [
                'attribute' => 'status',
                'format' => 'raw',
                'label' => 'Status',
                'value' => function($model){
                            $h = '';
                            if($model->status==0){
                                $h = 'Belum Diambil';
                            }elseif($model->status==1){
                                $h = 'Diambil';
                            }
                        return $h;
                }
        ],
        'tgl_ambil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
