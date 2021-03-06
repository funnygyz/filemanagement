<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use common\models\User;
use common\models\Poststatus;
use yii\redactor\widgets;
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
    #post-title{
  width: 100%;
  height: 30px;
  border-radius:3px;
}
    .titleclass{
  padding-top: 0px;
}
    .titleclass1{
  padding-left: 50px;
}
    .tbboder{
      border:2px solid #DCDCDC;
      border-radius:5px;
      margin: 8px;
    }
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
                    <ol class="breadcrumb">
            <li></li>
            <li></li>
            <li></li>
            </ol>
        <div class="header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.html">首页</a></li>
            <li><a href="selfindex">自己的文章</a></li>
            <li class="active">更新文章</li>
        </ul>
        <p>
        <div class="post-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="tbboder">
          <div class="row">
            <h3 class="col-md-1 titleclass1">标题</h3>
            <div class="col-md-10 titleclass">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>  
            </div>
          </div>
          <div class="row">
            <h3 class="col-md-1 titleclass1">内容</h3>
            <div class="col-md-10 titleclass">
              <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className())?>
            </div>
          </div>
          <div class="row">
            <h3 class="col-md-1 titleclass1">标签</h3>
            <div class="col-md-10 titleclass">
              <?= $form->field($model, 'tags')->widget(\yii\redactor\widgets\Redactor::className()) ?>
            </div>
          </div>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </body>
</html>


