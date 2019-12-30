<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Kontak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Terimakasih telah menghubungi kami, kami akan segera merespondnya.
        </div>


    <?php else: ?>

        <p>
            Jika ada pertanyaan,saran,kritik & keluhan yang ingin disampaikan kepada kami, <br>
            silahkan hubungi kami melalui info kontak dibawah ini atau dengan isi form dibawah ini untuk menghubungi kami.<br>
            Terimakasih.
        </p>
        <div class="row">
            <div class="col-lg-5">
            <address>
            <strong>Yayasan Rydha Tangerang</strong><br>
            Jl. Raya Mauk Km. 19 Tegal Kunir Lor 
            Mauk Tangerang 15530<br>
            <abbr title="Phone">Telp :</abbr>021-59331660<br>
            <abbr title="Phone">HP/WA :</abbr>0838 9542 0977<br>
            <abbr title="Phone">PIN BB :</abbr>PIN BB: 571DC9F1<br>
            <a href="mailto:#">yatimrydha@gmail.com</a>
            </address>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
