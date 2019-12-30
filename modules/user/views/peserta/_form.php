<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pendidikan;

/**
 * @var yii\web\View $this
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Profile $profile
 * @var app\modules\user\models\Role $role
 * @var yii\widgets\ActiveForm $form
 */

$module = $this->context->module;
$role = $module->model("Role");
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($user, 'email')->textInput() ?>
    <?= $form->field($user, 'username')->textInput() ?>
    <?= $form->field($user, 'role_id')->dropDownList($role::dropdown()); ?>
    <?= $form->field($user, 'newPassword')->passwordInput() ?>
    <?= $form->field($user, 'status')->dropDownList($user::statusDropdown()); ?>
    <?= $form->field($profile, 'no_identitas') ?>
    <?= $form->field($profile, 'full_name') ?>
    <?= $form->field($profile, 'foto')->fileInput() ?>
    <?= $form->field($profile, 'tgl_lahir')->widget('yii\jui\DatePicker',['options' => ['class'=>'form-control', 'style'=>'width:50%'],
        'dateFormat'=>'yyyy-MM-dd',]) ?>
    <?= $form->field($profile, 'anak_ke') ?>
    <?= $form->field($profile, 'jenis_kalamin')->dropDownList([ 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan', ], ['prompt' => 'Pilih Jenis Kelamin']) ?>
    <?= $form->field($profile, 'agama') ?>
    <?= $form->field($profile, 'alamat')->textArea(['maxlength' => true]) ?>
    <?= $form->field($profile, 'no_hp') ?>
    <?= $form->field($profile, 'tingkt_pddkn')->dropDownList(ArrayHelper::map(Pendidikan::find()->all(), 'id','pendidikan'),['prompt'=>'Pilih Tingkat Pendidikan']) ?>
    <?= $form->field($profile, 'nama_sekolah') ?>
    <?= $form->field($profile, 'jurusan') ?>
    <?= $form->field($profile, 'tahun_masuk') ?>

    
    <?php // use checkbox for banned_at ?>
    <?php // convert `banned_at` to int so that the checkbox gets set properly ?>
    <?php // convert `banned_at` to int so that the checkbox gets set properly ?>
    <!-- <?php $user->banned_at = $user->banned_at ? 1 : 0 
    //Html::activeLabel($user, 'banned_at', ['label' => Yii::t('user', 'Banned')]); 
   //Html::activeCheckbox($user, 'banned_at'); 
   //Html::error($user, 'banned_at'); ?> -->

    <!-- <?= $form->field($user, 'banned_reason'); ?> -->


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($user->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
