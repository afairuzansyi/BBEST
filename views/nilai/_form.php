<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\user\models\Profile;
use app\modules\user\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\Nilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => false,
    ]); ?>
  
    <?= $form->field($model, 'nama')
        ->dropDownList($model::getAllPeserta(),
        ['prompt' => 'Pilih Peserta B-BEST']) ?>
        
        <?= $form->field($model, 'id_pddkn')->dropDownList
        ($model::getPendidikan(),
        ['prompt' => 'Pilih Pendidikan']) ?>

        <?= $form->field($model, 'nilai') ?>

        <?= $form->field($model, 'semester') ?>
        
        <?= $form->field($model, 'tahun_ajaran') ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
