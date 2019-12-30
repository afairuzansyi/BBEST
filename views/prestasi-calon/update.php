<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrestasiCalon */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Prestasi Calon',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Prestasi Calon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Ubah');
?>
<div class="prestasi-calon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
