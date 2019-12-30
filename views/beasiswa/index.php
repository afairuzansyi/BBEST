<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Pendidikan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$pendidikan = new Pendidikan;
$this->title = Yii::t('app', 'Daftar Kategori Beasiswa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beasiswa-index">

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
                'attribute' => 'id_pddkn',
                'format' => 'raw',
                'label' => 'Pendidikan',
                'filter' => $pendidikan::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($pendidikan) {
                    $pendidikanDropdown = $pendidikan::dropdown();
                    return $pendidikanDropdown[$model->id_pddkn];
                },

            ],
            'jumlah_bea',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
