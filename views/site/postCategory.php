<?php

/* @var $this yii\web\View */

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'B-BEST RYDHA';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang!!</h1>
        <p> B-BEST RYDHA</p>

    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">
                <div>
                    <h2>Judul</h2>
                        <p></p>
                        <?php
                            foreach($posts as $post){
                            echo '<div>';
                            echo '<h2>'.$post->judul.'</h2>';
                            echo '<p>'.substr($post->konten,0,300).'...</p>';
                            echo '<div><span class="glyphicon glyphicon-user"> : '.$post->user->username. '</span> 
                                <span class="glyphicon glyphicon-time"> '.date('j F, Y',$post->create_time).'</span></div>';
                            echo '<p><a class="btn btn-default" href="'.\Yii::$app->urlManager->createUrl(['site/post-single', 'id' => $post->id]).'">readmore &raquo;</a></p>';
                            echo '</div>';
                            }
                            echo LinkPager::widget([
                            'pagination' => $pages,
                            ]);
                        ?>
                </div>
            </div>

            <div class="col-lg-3">
                    <h2>Category</h2>
                    <?php
                        $items=[];
                        foreach($categories as $category){
                        $items[]=['label' => $category->nama,'url' => '/site/post-category','id'=>$category->id];
                        }
                        echo Nav::widget([
                        'items' => $items,
                        ]);
                    ?>
            </div>
            </div>
    </div>
</div>
