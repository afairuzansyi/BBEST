<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Peserta;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SeleksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$peserta = new Peserta;
$this->title = Yii::t('app', 'Daftar Peserta Seleksi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seleksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_calon',
                'format' => 'raw',
                'label' => 'Nama Calon',
                'filter' => $peserta::dropdown2(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown2();
                    return $pesertaDropdown[$model->id_calon];
                },

            ],
            [
                'attribute' => 'hasil1',
                'format' => 'raw',
                'label' => 'Hasil Tahap 1',
                'value' => function($model){
                            $h = '';
                            if($model->hasil1==0){
                                $h = 'Proses';
                            }elseif($model->hasil1==1){
                                $h = 'Gagal';
                            }else{
                                $h = 'Lulus';
                            }
                        return $h;
                }
            ],
            [
                'attribute' => 'hasil2',
                'format' => 'raw',
                'label' => 'Hasil Tahap 2',
                'value' => function($model){
                            $h = '';
                            if($model->hasil2==0){
                                $h = 'Proses';
                            }elseif($model->hasil2==1){
                                $h = 'Gagal';
                            }else{
                                $h = 'Lulus';
                            }
                        return $h;
                }
            ],
            [
                'attribute' => 'hasil3',
                'format' => 'raw',
                'label' => 'Hasil Tahap 3',
                'value' => function($model){
                            $h = '';
                            if($model->hasil3==0){
                                $h = 'Proses';
                            }elseif($model->hasil3==1){
                                $h = 'Gagal';
                            }else{
                                $h = 'Lulus';
                            }
                        return $h;
                }
            ],
            [
                'attribute' => 'hasil4',
                'format' => 'raw',
                'label' => 'Hasil Tahap 4',
                'value' => function($model){
                            $h = '';
                            if($model->hasil4==0){
                                $h = 'Proses';
                            }elseif($model->hasil4==1){
                                $h = 'Gagal';
                            }else{
                                $h = 'Lulus';
                            }
                        return $h;
                }
            ],
            [
                'attribute' => 'hasil',
                'format' => 'raw',
                'label' => 'Hasil Akhir',
                'value' => function($model){
                            $h = '';
                            if($model->hasil==0){
                                $h = 'Proses';
                            }elseif($model->hasil==1){
                                $h = 'Gagal';
                            }else{
                                $h = 'Lulus';
                            }
                        return $h;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
