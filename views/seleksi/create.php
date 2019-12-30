<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seleksi */

$this->title = Yii::t('app', 'Tambah Peserta Seleksi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Peserta Seleksi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
