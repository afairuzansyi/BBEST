<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rekening */

$this->title = Yii::t('app', 'Tambah Rekening');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Rekening'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekening-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
