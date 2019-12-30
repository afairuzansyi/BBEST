<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\blog\Comment */
/* @var $form ActiveForm */
?>
<div class="site-formComment">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => false,
    ]); ?>

    <?php
    if (Yii::$app->user->isGuest) { ?>
    <?= $form->field($model, 'author')->textinput(['style'=>'width:50%;']) ?>
    <?= $form->field($model, 'email')->textinput(['style'=>'width:50%;']) ?>
    <?= $form->field($model, 'url') ?>
    <?php
    }
    ?>
 
    <?= $form->field($model, 'konten')->textarea(['rows'=>3]) ?>
    <?php
    //$form->field($model, 'status')
    //$form->field($model, 'post_id')
    //$form->field($model, 'create_time')
    ?>
        
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Komentari') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

</div><!-- site-formComment -->
