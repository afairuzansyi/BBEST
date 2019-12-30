<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Pendidikan',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pendidikan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pendidikan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
