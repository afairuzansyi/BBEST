<?php
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\blog\Kategori;

$this->title = 'Admin Dashbard';
?>
<div class="admin">
	<div class="body-content">
		<div class ="row">
			<div class="col-lg-10">
				<!--POST-->
				<div class="post-index">

    			<h1><?= Html::encode($this->title) ?></h1>
    			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    			<p>
        			<?= Html::a(Yii::t('app', 'Tambah Post'),  ['/post/create'], ['class' => 'btn btn-success']) ?>
    			</p>
				<?php Pjax::begin(); ?>    <?= GridView::widget([
			        'dataProvider' => $dataProvider,
			        'filterModel' => $searchModel,
			        'columns' => [
			            ['class' => 'yii\grid\SerialColumn'],

			            'id',
			            'judul',
			            'konten:ntext',
			            //'kategori_id.kategori',
			            [
			            	'attribute' => 'kategori_id',
			            	'label' => 'Kategori',
			            	'format' => 'raw',
			            	'value' => 'kategori.nama',
			            ],
			            'status',
			            // 'create_time:datetime',
			            // 'update_time:datetime',
			            // 'user_id',

			            ['class' => 'yii\grid\ActionColumn'],
			        ],
			    ]); ?>

				<?php Pjax::end(); ?></div>