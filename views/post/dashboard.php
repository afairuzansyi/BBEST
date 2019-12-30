<?php
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Tabs;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\blog\Kategori;
use yii\helpers\ArrayHelper;
use yii\bootstrap\BaseHtml;
use app\modules\user\models\Role;

$this->title = 'Admin Dashbard';
?>
<div class="admin">
	<div class="body-content">
		<div class ="row">
			<div class="col-lg-9">
				<!--POST-->
				<div class="post-index">

				<h1><?= Html::encode($this->title) ?></h1>
 
				<?php $post = GridView::widget([
			        'dataProvider' => $dataProvider,
			        'filterModel' => $searchModel,
			        'tableOptions' => ['id' => 'inquiry-claimed-grid', 'class' => 'table table-striped table-bordered'],
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
			            	'filter' => Html::activeDropDownList
			            		($searchModel, 'kategori_id', ArrayHelper::map(Kategori::find()
			            			->asArray()
			            			->all(),'id','nama'), 
			            		['class'=>'form-control','prompt' => 'Select Category']),
			            ],
			            [
			                'attribute' => 'status',
			                'format' => 'raw',
			                'label' => 'Status Post',
			                'value' => function($model){
			                            $l = '';
			                            if($model->status==0){
			                                $l = 'Draft';
			                            }else{
			                                $l = 'Publish';
			                            }
			                        return $l;
			                },
			                'filter' => [1 => 'Publish', 2 => 'Draft'],
		           		],
			            // 'create_time:datetime',
			            // 'update_time:datetime',
			            // 'user_id',

			            //['class' => 'yii\grid\ActionColumn'],
			        ],
			    ]);
			    ?>
			    <?php
				echo Tabs::widget([
						    'options' => ['tab' => 'div'],
						    'itemOptions' => ['tab' => 'div'],
						    'items' => [
	       				[
				            'options' => ['id' => 'tab-c'],
				            'label' => 'Post',
				            'content' => $post,
	      				],
				    ],
				]);
				?>
			</div>
		</div>
		<div class = "col-lg-3">
				<h3>Menu Admin</h3>
				<hr>
				<?php
					$items = [];
					$items[] = ['label' => Html::icon('file') .' Post', 'url' => ['/post/index']];
					$items[] = ['label' => Html::icon('tag') .' Kategori Post',  'url' => ['/kategori/index']];

					$blog = Nav::widget([
                        'items' => $items,
                        'encodeLabels' => false
                        ]);

					$item = [];
					$item[] = ['label' => Html::icon('flag') .' User',  'url' => ['user/admin'],'visible' => !Yii::$app->user->can('keuangan')];

					$item[] = ['label' => Html::icon('flag') .' Pendidikan',  'url' => ['pendidikan/index']];
					$item[] = ['label' => Html::icon('flag') .' Seleksi B-BEST',  'url' => ['seleksi/index']];
					$item[] = ['label' => Html::icon('flag') .' Kategori Beasiswa',  'url' => ['beasiswa/index']];
					$item[] = ['label' => Html::icon('flag') .' Peserta',  'url' => ['peserta/index']];
					$item[] = ['label' => Html::icon('flag') .' Prestasi Calon',  'url' => ['prestasi-calon/index']];
					$item[] = ['label' => Html::icon('flag') .' Nilai',  'url' => ['nilai/index']];
					$item[] = ['label' => Html::icon('flag') .' Ambil Beasiswa',  'url' => ['ambil-beasiswa/index']];
					$item[] = ['label' => Html::icon('flag') .' Laporan Ambil Beasiswa',  'url' => ['ambil-beasiswa/lap']];
					$item[] = ['label' => Html::icon('flag') .' Laporan Nilai',  'url' => ['nilai/lap']];

					$simb = Nav::widget([
                        'items' => $item,
                        'encodeLabels' => false
                        ]);

					echo Tabs::widget([
						    'options' => ['tab' => 'div'],
						    'itemOptions' => ['tab' => 'div'],
						    'items' => [
	       				[
				            'options' => ['id' => 'tab-d'],
				            'label' => 'Blog',
				            'content' => $blog,
	      				],
				        [
				            'options' => ['id' => 'tab-ud'],
				            'label' => 'B-BEST',
				            'content' => $simb,
				        ],
				        ]
				        ]);
				?>
		</div>
	</div>
</div>