<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seleksi */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Seleksi',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Peserta Seleksi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Ubah');
?>
<div class="seleksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
