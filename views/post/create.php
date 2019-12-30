<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\blog\Post */

$this->title = Yii::t('app', 'Tambah Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Post'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
