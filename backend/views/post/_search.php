<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Poststatus;
use common\models\User;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();

/* @var $this yii\web\View */
/* @var $model common\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
#postsearch-starttime{
    width: 100px;
    height: 34px;
    font-size: 14px;
    border-radius:4px;
    color:#555555;
}
#postsearch-endtime{
    width: 100px;
    height: 34px;
    font-size: 14px;
    border-radius:4px;
    color:#555555;
}
#postsearch-title{
    width: 180px;
    height: 34px;
    font-size: 14px;
    border-radius:4px;
    color:#555555;
}
.mytext 
{   
    font-size: 14px;
    padding-top:10px;
    padding-left:20px;
    font-weight:bold;
}
.backcolor{
    border-radius:4px;
    background-color:#F0F0F0;
    padding-left:20px;
}
.spclass{
     padding-top: 10px;
     padding-right: 5px;
}
</style>
<div class="post-search backcolor">                                                
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-1 mytext">
        创建时间
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'startTime')->widget(DatePicker::classname(), [ 
            'options' => ['placeholder' => '开始时间'], 
            'pluginOptions' => [ 
            'autoclose' => true, 
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd',  
            ] 
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'endTime')->widget(DatePicker::classname(), [ 
            'options' => ['placeholder' => '结束时间'], 
            'pluginOptions' => [ 
            'autoclose' => true, 
            'todayHighlight' => true, 
            'format' => 'yyyy-mm-dd', 
            ] 
            ]); ?>
        </div>
        <div class="col-md-1 mytext">
        文章状态
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'status')->widget(Select2::classname(), [
            'data' => Poststatus::find()->select(['name','id'])->orderBy('position')->indexBy('id')->column(),
            'language' => 'zh-CN',
            'options' => ['placeholder' => '请选择文章状态'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ]); ?>
        </div>
        <div class="col-md-1 mytext">
        作者昵称
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'author_id')->widget(Select2::classname(), [
            'data' => User::find()->select(['nickname','id'])->orderBy('id')->indexBy('id')->column(),
            'language' => 'zh-CN',
            'options' => ['placeholder' => '请选择作者'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ]); ?>
        </div>
    </div>  
    <div class="row">
    <div class="col-md-1 mytext">
    标题
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'title')?>
    </div>
    </div>     
    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => ' btn btn-info']) ?>
        <?= Html::a('新建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
