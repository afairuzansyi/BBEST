<?php

//use yii\helpers\Html;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\search\UserSearch $searchModel
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Role $role
 */


$module = $this->context->module;
$user = $module->model("User");
$role = $module->model("Role");

$this->title = Yii::t('user', 'User');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="user-index">

                    <h1><?= Html::encode($this->title) ?></h1>

                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <p>

                                  <?= Html::a(Yii::t('user', 'Tambah Admin', [
                                  'modelClass' => 'User',
                                ]), ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                                    <?php \yii\widgets\Pjax::begin(); ?>
                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            'id',
                                            [
                                                'attribute' => 'role_id',
                                                'label' => Yii::t('user', 'Role'),
                                                'filter' => $role::dropdown(),
                                                'value' => function($model, $index, $dataColumn) use ($role) {
                                                    $roleDropdown = $role::dropdown();
                                                    return $roleDropdown[$model->role_id];
                                                },
                                            ],
                                            [
                                                'attribute' => 'status',
                                                'label' => Yii::t('user', 'Status'),
                                                'filter' => $user::statusDropdown(),
                                                'value' => function($model, $index, $dataColumn) use ($user) {
                                                    $statusDropdown = $user::statusDropdown();
                                                    return $statusDropdown[$model->status];
                                                },
                                            ],
                                            'email:email',
                                            //'profile.full_name',
                                            'created_at',
                                            // 'username',
                                            // 'password',
                                            // 'auth_key',
                                            // 'access_token',
                                            // 'logged_in_ip',
                                            // 'logged_in_at',
                                            // 'created_ip',
                                            // 'updated_at',
                                            // 'banned_at',
                                            // 'banned_reason',

                                            ['class' => 'yii\grid\ActionColumn'],
                                        ],
                                    ]); ?>
                                    <?php \yii\widgets\Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>

</div>
