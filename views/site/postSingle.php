<?php
use yii\bootstrap\Nav;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">
                <?php
                echo '<div>';
                echo '<h2>'.$post->judul.'</h2>';
                echo '<p>'.$post->konten.'</p>';
                echo '<p><small>Posted by '.$post->user->username.' at '.date('F j, Y, g:i a',$post->create_time).'</small></p>';
                echo '</div>';
                ?>                
            </div>
            <div class="col-lg-3">
                <h2>Kategori</h2>
                <?php               
                $items=[];  
                foreach($categories as $category){
                    $items[]=['label' => $category->nama , 'url' => \Yii::$app->urlManager->createUrl(['site/post-category', 'id' => $category->id])];
                }
                echo Nav::widget([
                    'items' => $items,
                ]);
                ?>                
            </div>
        </div>
    </div>
</div>
