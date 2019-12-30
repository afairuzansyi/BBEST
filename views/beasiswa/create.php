<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Beasiswa */

$this->title = Yii::t('app', 'Tambah Beasiswa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kategori Beasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beasiswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
