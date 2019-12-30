<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use amnah\yii2\user\models\Profile;
use app\models\Seleksi;


/* @var $this yii\web\View */
/* @var $model app\models\Seleksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seleksi-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        
    ]); ?>

    <?= $form->field($model, 'id_calon')
             ->dropDownList($model::dropdown(),
                ['prompt' => 'Pilih Peserta Seleksi']) 
    ?>

    <?= $form->field($model, 'hasil1')
             ->dropDownList(
                ['0' => 'Proses',
                 '1' => 'Lulus',
                 '2' => 'Gagal'],
                ['prompt' => 'Hasil Seleksi Tahap Administrasi']
    ) ?>

    <?= $form->field($model, 'hasil2')
                ->dropDownList(
                ['0' => 'Proses',
                 '1' => 'Lulus',
                 '2' => 'Gagal'],
                ['prompt' => 'Hasil Seleksi Tahap Pisikotes']
    ) ?>

    <?= $form->field($model, 'hasil3')
                 ->dropDownList(
                ['0' => 'Proses',
                 '1' => 'Lulus',
                 '2' => 'Gagal'],
                ['prompt' => 'Hasil Seleksi Tahap Interview']
    ) ?>

    <?= $form->field($model, 'hasil4')
                ->dropDownList(
                ['0' => 'Proses',
                 '1' => 'Lulus',
                 '2' => 'Gagal'],
                ['prompt' => 'Hasil Seleksi Tahap Survey']
    ) ?>

    <?= $form->field($model, 'hasil')
                ->dropDownList(
                ['0' => 'Proses',
                 '1' => 'Lulus',
                 '2' => 'Gagal'],
                ['prompt' => 'Hasil Akhir Seleksi']
    ) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tambah') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
