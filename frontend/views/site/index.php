<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="post/detail?id=1&title=简单爱" ><img src="111.jpg" alt="..."></a>
              <div class="carousel-caption">
                <h1>简单爱</h1>
              </div>
            </div>
            <div class="item">
              <img src="222.jpg" alt="...">
              <div class="carousel-caption">
                船
              </div>
            </div>
            <div class="item">
              <img src="333.jpg" alt="...">
              <div class="carousel-caption">
                <h3>吉他</h3>
              </div>
            </div>
            ...
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    </div>
    <div class="container">
        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2>查看所有文章</h2>

                    <p></p>

                    <p><a class="btn btn-default" href="post/index">查看所有文章 &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>管理自己的文章</h2>

                    <p></p>

                    <p><a class="btn btn-default" href="post/selfindex">管理自己的文章 &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>留做备用</h2>

                    <p> </p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">留做备用 &raquo;</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
