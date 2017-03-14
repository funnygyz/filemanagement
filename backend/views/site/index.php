<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\RctUserWidget;
use backend\components\RctPostWidget;
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();

AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>管理页</title>
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
            height:50px;
            width:100px;
            margin: 200px;
        }
        .class{
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .netclass{
            font-weight:bold;
        }
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
            <div class="stats">  
</div>

            <h1 class="page-title">简略信息</h1>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>欢迎你:</strong> 希望你喜欢这个界面!
    </div>

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">数据统计</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?= Html::encode($postmodel->postcount) ?></p>
                        <p class="detail">文章数量</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?= Html::encode($adminusermodel->adminusercount) ?></p>
                        <p class="detail">管理用户人数</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?= Html::encode($usermodel->usercount) ?></p>
                        <p class="detail">用户人数</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?= Html::encode($commentmodel->commentcount) ?></p>
                        <p class="detail">评论数</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">新增用户<span class="label label-warning">这里显示最近新增的10位用户</span></a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>用户名</th>
                  <th>昵称</th>
                  <th>联系方式</th>
                  <th>注册时间</th>
                </tr>
              </thead>
              <tbody>
              <?= RctUserWidget::widget(['recentlyuser'=>$recentlyuser])?>
              </tbody>
            </table>
            <p><a href="users.html">More...</a></p>
        </div>
    </div>
    <div class="block span6">
        <a href="#widget1container" class="block-heading" data-toggle="collapse">制作人 </a>
        <div id="widget1container" class="block-body collapse in">
            <h2>就是个练习</h2>
            <p>有什么不会这个能帮你+1 <a href="http://www.baidu.com/" target="_blank">百度</a></p>
            <p>有什么不会这个能帮你+2 <a href="http://www.yiichina.com/" target="_blank">yii2.0</a></p>
            <p>有什么不会这个能帮你+3 <a href="http://www.bootcss.com/" target="_blank">bootstrap</a></p>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">最近新增的文章</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <thead>
                <tr>
                  <th>文章id</th>
                  <th>文章名</th>
                  <th>创建时间</th>
                  <th>作者</th>
                </tr>
              </thead>
              <tbody>
              <?= RctPostWidget::widget(['recentlypost'=>$recentlypost])?>
              </tbody>
            </table>
        </div>
    </div>
    <div class="block span6">
        <p class="block-heading">备用栏</p>
        <div class="block-body">
            <h2>

            </h2>
            <p></p>
            <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>
    </div>
</div>     
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


