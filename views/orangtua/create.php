<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */

$this->title = Yii::t('app', 'Tambah Orangtua');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Orangtua'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
