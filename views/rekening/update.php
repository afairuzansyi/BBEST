<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rekening */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Rekening',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Rekening Peserta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rekening-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
