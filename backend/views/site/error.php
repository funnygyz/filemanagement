<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();
$this->title = $name;
?>
<style>
 .class111{
    padding:250px ;
 }   
</style>

    <div class="site-error">

        <h1><?= Html::encode($this->title) ?></h1>
<div class="class111">
        <div class="alert alert-danger">
            抱歉，你没有此权限。
        </div>
    </div>
</div>