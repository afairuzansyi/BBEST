<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pendidikan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Beasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beasiswa-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2'],
        ],
    ]);?>

    <?= $form->field($model, 'id_pddkn')->dropDownList(ArrayHelper::map(Pendidikan::find()->all(), 'id','pendidikan'),['prompt' => 'Pilih Tingkat Pendidikan']) ?>

    <?= $form->field($model, 'jumlah_bea')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tambah') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
