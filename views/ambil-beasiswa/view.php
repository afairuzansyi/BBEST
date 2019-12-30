<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AmbilBeasiswa */

$this->title = $model->code_trans;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ambil Beasiswas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambil-beasiswa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->code_trans], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->code_trans], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code_trans',
            'tgl',
            'idPeserta.nama_lengkap',
            'idPddkn.pendidikan',
            'noRekening.no_rekening',
            'beasiswa0.jumlah_bea',
            'tgl_ambil',
            'status',
        ],
    ]) ?>

</div>
