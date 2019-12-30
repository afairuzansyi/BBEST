<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peserta;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrangtuaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$peserta = new Peserta;

$this->title = Yii::t('app', 'Daftar Orangtua');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-index">

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
            [
                'attribute' => 'id_peserta',
                'format' => 'raw',
                'label' => 'Nama Peserta / Calon',
                'filter' => $peserta::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown();
                    return $pesertaDropdown[$model->id_peserta];
                },

            ],
            //'id_peserta',
            'nama_ayah',
            'nama_ibu',
            //'tgl_lahir_ayah',
            // 'tgl_lahir_ibu',
            // 'alamat',
            // 'pkrjn_ayah',
            // 'pkrjn_ibu',
            // 'tempat_lahir_ayah',
            // 'tempat_lahir_ibu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
