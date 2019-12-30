<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pendidikan;
use app\models\Peserta;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$pendidikan = new Pendidikan;
$peserta = new Peserta;

$this->title = Yii::t('app', 'Daftar Peserta atau Calon Peserta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['post/dashboard']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-index">

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

            'id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'label' => 'Status',
                'filter' => $peserta::statusDropdown(),
                'value' => function($model, $index, $dataColumn) use ($peserta) {
                    $statusDropdown = $peserta::statusDropdown();
                    return $statusDropdown[$model->status];
                },
                
            ],
            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            // 'jenis_kelamin',
            // 'tinggal_pada',
            // 'no_hp',
            [
                'attribute' => 'tingkat_pddkn',
                'format' => 'raw',
                'label' => 'Tingkat Pendidikan',
                'filter' => $pendidikan::dropdown(),
                'value' => function($model, $index, $dataColumn) use ($pendidikan) {
                    $pendidikanDropdown = $pendidikan::dropdown();
                    return $pendidikanDropdown[$model->tingkat_pddkn];
                },

            ],
            //'tingkat_pddkn',
            // 'nama_sekolah',
            // 'hoby',
            // 'cita_cita',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
