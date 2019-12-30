<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\blog\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Post');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judul',
            'konten:ntext',
            [
                            'attribute' => 'kategori_id',
                            'label' => 'Kategori',
                            'format' => 'raw',
                            'value' => 'kategori.nama',
                            'filter' =>yii\helpers\ArrayHelper::map(app\models\blog\Kategori::find()->asArray()->all(), 'id', 'nama'),
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
