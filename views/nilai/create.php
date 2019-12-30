<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nilai */

$this->title = Yii::t('app', 'Tambah Nilai');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Nilai Peserta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'nilaiPeserta' => $nilaiPeserta,
        //'peserta' => $peserta,
    ]) ?>

</div>
