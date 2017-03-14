<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use common\models\Post;
use yii\caching\DbDependency;
use yii\caching\yii\caching;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
    <div class="container">

        <div class="row">
        
            <div class="col-md-9">
            
            <ol class="breadcrumb">
            <li></li>
            <li></li>
            </ol>

            <ol class="breadcrumb">
            <li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
            <li>文章列表</li> 
            </ol>
            <div class="form-group">
            <?= Html::a('新建文章', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <?php
            //listview参数
            //{summary}的位置会显示基本描述，可修改summaryText项来设置描述的模板
            //{sorter}的位置会显示更改排序方式的按钮，需要定义sortableAttributes项来描述哪一属性是可排序的
            //{items}的位置会显示列表，列表中每一项的格式来自itemView项定义的文件
            //{pager}的位置会显示分页器，可通过定义pager项来设定分页器的显示方式
            ?>
            <?= ListView::widget([
                    'id'=>'postList',
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_selflist',
                    'layout'=>'{items} {pager}',
                    'pager'=>[
                            'maxButtonCount'=>10,
                            'nextPageLabel'=>Yii::t('app','下一页'),
                            'prevPageLabel'=>Yii::t('app','上一页'),
            ],
            ])?>
            
            </div>

            
            <div class="col-md-3">
                <div class="searchbox">
                    <ul class="list-group">
                      <li class="list-group-item">
                      <ol class="breadcrumb">
                      <li></li>
                      <li></li>
                      </ol>
                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找文章（
                      <?= Post::find()->count();?>
                      ）
                      </li>
                      <li class="list-group-item">              
                        <?php $form = ActiveForm::begin([
                          'action' => ['index'],
                          'method' => 'get',
                          ]); ?>
                          <?= $form->field($FrontsearchModel, 'title')?>
                           <div class="form-group">
                           <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                        <?php ActiveForm::end(); ?>
                        </div>
                      </li>
                    </ul>           
                </div>
                
                <div class="tagcloudbox">
                    <ul class="list-group">
                      <li class="list-group-item">
                      <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 标签云
                      </li>
                      <li class="list-group-item">
                      <?= TagsCloudWidget::widget(['tags'=>$tags]);?>
                      
                       </li>
                    </ul>           
                </div>
                
                
                <div class="commentbox">
                    <ul class="list-group">
                      <li class="list-group-item">
                      <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新回复
                      </li>
                      <li class="list-group-item">
                      <?= RctReplyWidget::widget(['recentComments'=>$recentComments]);?>
                      </li>
                    </ul>           
                </div>
                
            
            </div>
            
            
        </div>

    </div>