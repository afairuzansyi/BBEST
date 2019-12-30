<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Pendidikan;


/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-profile">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($flash = Yii::$app->session->getFlash("Profile-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>

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

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>