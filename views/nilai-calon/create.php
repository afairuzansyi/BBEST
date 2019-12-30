<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NilaiCalon */

$this->title = Yii::t('app', 'Tambah Nilai Calon');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Nilai Calon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-calon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
