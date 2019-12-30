<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\blog\Kategori */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Kategori',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
