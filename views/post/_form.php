<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\blog\Kategori;
use amnah\yii2\user\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\blog\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => false,
    ]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konten')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kategori_id')
        ->dropDownList(ArrayHelper::map(Kategori::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Kategori']) ?>

    <?php
        echo $form->field($model, 'status')
        ->dropDownList(
        ['0'=>'Draft','1'=>'Publish'],
        ['prompt'=>'Pilih Status']
    );
    ?>

    <?php
        if(Yii::$app->user->isGuest){ ?>

    <?= $form->field($model, 'user_id')->textInput() ?>
    <?php
        }
    ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tambah') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
