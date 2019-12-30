<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrestasiCalon */

$this->title = Yii::t('app', 'Tambah Prestasi Calon');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Prestasi Calon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestasi-calon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
