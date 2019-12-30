<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AmbilBeasiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambil-beasiswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code_trans') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'id_peserta') ?>

    <?= $form->field($model, 'id_pddkn') ?>

    <?= $form->field($model, 'no_rekening') ?>

    <?php echo $form->field($model, 'beasiswa') ?>

    <?php echo $form->field($model, 'tgl_ambil') ?>

    <?php echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
