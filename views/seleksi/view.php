<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seleksi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Peserta Seleksi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seleksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', "Apa anda yakin ingin menghapus ini?".$model->id.""),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'peserta.nama_lengkap',
            [
                'attribute' => 'hasil1',
                'format' => 'raw',
                'label' => 'Tahap Administrasi',
                'value' => $model->getLabel1()
            ],
            [
                'attribute' => 'hasil2',
                'format' => 'raw',
                'label' => 'Tahap Psikotes',
                'value' => $model->getLabel2()
            ],
            [
                'attribute' => 'hasil3',
                'format' => 'raw',
                'label' => 'Tahap Interview',
                'value' => $model->getLabel3()
            ],
            [
                'attribute' => 'hasil4',
                'format' => 'raw',
                'label' => 'Tahap Survey',
                'value' => $model->getLabel4()
            ],
            [
                'attribute' => 'hasil',
                'format' => 'raw',
                'label' => 'Hasil Akhir',
                'value' => $model->getLabel()
            ],
        ],
    ]) ?>

</div>
