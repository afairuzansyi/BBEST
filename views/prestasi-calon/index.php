<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Peserta;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PrestasiCalonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$peserta = new Peserta;

$this->title = Yii::t('app', 'Daftar Prestasi Calon');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestasi-calon-index">

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
                'attribute' => 'id_calon',
                'format' => 'raw',
                'label' => 'Nama Calon Peserta',
                'filter' => $peserta::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $pesertaDropdown = $peserta::dropdown();
                    return $pesertaDropdown[$model->id_calon];
                },

            ],
            'nama_kejuaraan',
            'tingkat',
            'juara',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
