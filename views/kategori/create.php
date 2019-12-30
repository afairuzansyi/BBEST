<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\blog\Kategori */

$this->title = Yii::t('app', 'Tambah Kategori');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
