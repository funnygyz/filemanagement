<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();
$this->title = $model->title;
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>详细页</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">

    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->

  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->

    <div class="content">
        
        <div class="header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.html">首页</a></li>
            <li><a href="index.php?r=post/index">文章的增删改查</a></li>
            <li class="active">文章详细</li>
        </ul>
        <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定删除这篇文章吗?',
                'method' => 'post',
            ],
        ]) ?>
        </p>
         <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'title',
            [
            'label'=>'标题',
            'value'=>$model->title,     
            ],
            //'content:ntext',
            [
            'label'=>'内容',
            'value'=>$model->content,     
            ],
            //'tags:ntext',
            [
            'label'=>'标签',
            'value'=>$model->tags,     
            ],
            //'status',
            [
            'label'=>'文章状态',
            'value'=>$model->status0->name,     
            ],
            //'create_time:datetime',
            //'update_time:datetime',
            [
            'attribute'=>'create_time',
            'value'=>date("Y-m-d H:i:s",$model->create_time),
            ],
            [
            'attribute'=>'update_time',
            'value'=>date("Y-m-d H:i:s",$model->update_time),
            ],
            //'author_id',
            [
            'label'=>'作者',
            'value'=>$model->postAuthor->nickname,     
            ],
        ],
        'template'=>'<tr><th style="width:120px;">{label}</th><td>{value}</td></tr>',
        'options'=>['class'=>'table table-striped table-bordered detail-view'],
    ]) ?>

    </div>
  </body>
</html>


