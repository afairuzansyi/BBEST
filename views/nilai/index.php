<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peserta;
use app\models\Pendidikan;
use app\models\NilaiPeserta;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$pendidikan = new Pendidikan;
$peserta = new Peserta;

$this->title = Yii::t('app', 'Daftar Nilai Peserta');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            /*[
                'attribute' => 'peserta',
                'format' => 'raw',
                'label' => 'Nama Peserta',
                'filter' => $peserta::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown();
                    return $pesertaDropdown[$model->nama_lengkap];
                },

            ],*/
            //'peserta.nama_lengkap',
           /* [
                'attribute' => 'peserta',
                'format' => 'raw',
                'label' => 'Nama Lengkap',
                'filter' => $peserta::dropdown(),
                'value' => function($model,$index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown();
                    return $pesertaDropdown[$model->id_peserta];
                },

            ],*/
            [
            'attribute' => 'id_peserta',
            'format' => 'raw',
            'label' => 'Nama Peserta',
            'value'=>function ($data) {
            $d = array();
            foreach ($data->peserta as $k=>$m)
            {
              $d[] = NilaiPeserta::get_nilai_name_by_id($m->id);
            }
            return implode($d, ', '); 
          },
        ],
            [
                'attribute' => 'id_pddkn',
                'format' => 'raw',
                'label' => 'Tingkat Pendidikan',
                'filter' => $pendidikan::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($pendidikan) {
                    $pendidikanDropdown = $pendidikan::dropdown();
                    return $pendidikanDropdown[$model->id_pddkn];
                },

            ],
            //'id_pddkn',
            'nilai',
            'semester',
            'tahun_ajaran',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
