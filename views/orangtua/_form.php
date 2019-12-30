<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Peserta;

/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */
/* @var $form yii\widgets\ActiveForm */

$peserta = new Peserta;
?>



<div class="orangtua-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        
    ]); ?>


    <?= $form->field($model, 'id_peserta')->dropDownList($model::dropdown(),
        ['prompt' => 'Pilih Calon / Peserta B-BEST']) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir_ayah')->textInput() ?>

    <?= $form->field($model, 'pkrjn_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir_ibu')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'tgl_lahir_ibu')->textInput() ?>

    <?= $form->field($model, 'pkrjn_ibu')->textInput(['maxlength' => true]) ?>  

    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
