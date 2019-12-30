<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Nilai;
/* @var $this yii\web\View */
/* @var $model app\models\AmbilBeasiswa */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Laporan Nilai Peserta';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['post/dashboard']];
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="nilai-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'action' => 'v',
    ]); ?>

    <?= $form->field($model, 'tahun_ajaran')->dropDownList
        ($model::tajaran(),
        ['id'=>'id_tajaran','prompt' => 
        'Pilih Tahun Ajaran']) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Lihat') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
