<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrangtuaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orangtua-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_peserta') ?>

    <?= $form->field($model, 'nama_ayah') ?>

    <?= $form->field($model, 'nama_ibu') ?>

    <?= //$form->field($model, 'tgl_lahir_ayah') ?>

    <?php // echo $form->field($model, 'tgl_lahir_ibu') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'pkrjn_ayah') ?>

    <?php // echo $form->field($model, 'pkrjn_ibu') ?>

    <?php // echo $form->field($model, 'tempat_lahir_ayah') ?>

    <?php // echo $form->field($model, 'tempat_lahir_ibu') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
