<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Poststatus;
//use common\models\Comment;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();

//var_dump(Yii::$app->user->identity);exit();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
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
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
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
            
            <h1 class="page-title">文章增删查改</h1>

        </div>
        <ul class="breadcrumb">
        <li><a href="index.html">首页</a></li>
         <li class="active">文章增删查改</li>
        </ul> 
        <div class="container-fluid">
<div class="row-fluid">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterRowOptions'=>['class'=>'hidden'],
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                ['attribute'=>'id',
                'contentOptions'=>['width'=>'30px'],
                ],
                //'title',
                ['attribute'=>'title',
                'label'=>'文章名',
                'value'=>'title',
                ],
                //'content:ntext',
                //'tags:ntext',
                ['attribute'=>'tags',
                'label'=>'标签',
                ],
                //'status',
                ['attribute'=>'status',
                'label'=>'文章状态',
                'value'=>'status0.name',
                ],
                // 'author_id',
                ['attribute'=>'authorName',
                'label'=>'作者',
                'value'=>'postAuthor.nickname',
                ],
                // 'create_time:datetime',
                ['attribute'=>'create_time',
                'format'=>['date','php:Y-m-d H:i:s'],
                ],
                // 'update_time:datetime',
                ['attribute'=>'update_time',
                'format'=>['date','php:Y-m-d H:i:s'],
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>           
                    <footer>
                        <hr>
                        
                        <p class="pull-right">BuildByGyz <a href="http://www.baidu.com/" title="郭勇志" target="_blank">郭勇志</a></p>
                        

                        <p>&copy; 2017 <a href="#" target="_blank">Test</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


