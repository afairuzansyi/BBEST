<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiCalon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-calon-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => false,
    ]); ?>

    <?= $form->field($model, 'id_calon')->dropDownList
        ($model::getAllCalon(),
        ['prompt' => 'Pilih Calon Peserta B-BEST']) ?>

    <?= $form->field($model, 'tingkat_pddkn')->dropDownList
        ($model::getPendidikan(),
        ['prompt' => 'Pilih Pendidikan']) ?>

    <?= $form->field($model, 'kelas')->textInput() ?>

    <?= $form->field($model, 'smst_ganjil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smst_genap')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
