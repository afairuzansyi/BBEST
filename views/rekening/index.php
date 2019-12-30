<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peserta;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RekeningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$peserta = new Peserta;

$this->title = Yii::t('app', 'Daftar Rekening Peserta');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekening-index">

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
            //'id_peserta',
            [
                'attribute' => 'id_peserta',
                'format' => 'raw',
                'label' => 'Nama Peserta',
                'filter' => $peserta::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown();
                    return $pesertaDropdown[$model->id_peserta];
                },

            ],
            'nama_bank',
            'no_rekening',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
