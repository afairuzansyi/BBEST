<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeleksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seleksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_calon') ?>

    <?= $form->field($model, 'hasil1') ?>

    <?= $form->field($model, 'hasil2') ?>

    <?= $form->field($model, 'hasil3') ?>

    <?php // echo $form->field($model, 'hasil4') ?>

    <?php // echo $form->field($model, 'hasil') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
