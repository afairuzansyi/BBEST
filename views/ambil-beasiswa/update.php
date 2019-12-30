<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AmbilBeasiswa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ambil Beasiswa',
]) . $model->code_trans;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pengambilan Beasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code_trans, 'url' => ['view', 'id' => $model->code_trans]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ambil-beasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
