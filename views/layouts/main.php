<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Orangtua;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'B-BEST RYDHA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Beranda', 'url' => ['/site/index']],
            ['label' => 'Tentang Kami', 'url' => ['/site/tentang']],
            ['label' => 'Hubungi Kami', 'url' => ['/site/kontak']],
            ['label' => 'Dashboard', 
             'url' => ['/post/dashboard'],
             'visible' => !Yii::$app->user
             ->isGuest],
            //['label' => 'User', 'url' => ['/user']],
            Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/user/login']] : // or ['/user/login-email']
            ['label' => 'Hai!! ' . Yii::$app->user->displayName . '',
                'items' => [
                    ['label' => 'Logout',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']],
                    ],
            ],
],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; B-BEST RYDHA @ TA <?= date('Y') ?></p>

        <p class="pull-right">Ahmad Fairuz Zabadi <?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
