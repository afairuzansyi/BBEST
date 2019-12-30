<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\DepDrop;
use app\models\AmbilBeasiswa;
/* @var $this yii\web\View */
/* @var $model app\models\AmbilBeasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambil-beasiswa-form">

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        
    ]); ?>

    <?= $form->field($model, 'code_trans')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Periode...'],
           'pluginOptions' => [
               'autoclose'=>true,
               'format' => 'yyyy/mm/dd'
        ]
    ])?>

    <?= $form->field($model, 'id_peserta')->dropDownList
        ($model::getAllPeserta(),
        ['id'=>'id_peserta','prompt' => 
        'Pilih Peserta']
        ); ?>

    <?= $form->field($model, 'id_pddkn')->widget(DepDrop::classname(), [
            'options'=>['id'=>'id_pddkn'],
            'pluginOptions'=>[
                'depends'=>['id_peserta'],
                'placeholder'=>'Pilih Pendidikan',
                'url'=>Url::to(['ambil-beasiswa/pend'])
            ]
        ]); 
    ?>

    <?= $form->field($model, 'no_rekening')->widget(DepDrop::classname(), [
            'options'=>['id'=>'no_rekening'],
            'pluginOptions'=>[
                'depends'=>['id_peserta'],
                'placeholder'=>'Pilih No Rekening',
                'url'=>Url::to(['ambil-beasiswa/rek'])
            ]
        ]);  ?>

    <?= $form->field($model, 'beasiswa')->widget(DepDrop::classname(), [
            'options'=>['id'=>'beasiswa'],
            'pluginOptions'=>[
                'depends'=>['id_pddkn'],
                'placeholder'=>'Pilih..',
                'url'=>Url::to(['ambil-beasiswa/bea'])
            ]
        ]);  ?>

    <?= $form->field($model, 'tgl_ambil')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tanggal Ambil'],
           'pluginOptions' => [
               'autoclose'=>true,
               'format' => 'yyyy/mm/dd'
        ]
    ])?>
    <?= $form->field($model, 'status')->dropDownList(['0' => 'Belum Diambil', '1' => 'Sudah Diambil'],
        ['prompt' => 'Pilih Status']) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Tambah') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
