<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Commentstatus;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\CommentSearch */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use common\models\Comment;
$this->params['count'] = Comment::getNotCheckCommentcount();
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
<div class="comment-search backcolor">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-1 mytext">
        评论状态
        </div>
        <div class="col-md-2">
        <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => Commentstatus::find()->select(['name','id'])->orderBy('position')->indexBy('id')->column(),
        'language' => 'zh-CN',
        'options' => ['placeholder' => '请选择评论状态'],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ]); ?>
        </div>
        <div class="col-md-1 mytext">
        评论人
        </div>
        <div class="col-md-2">
        <?= $form->field($model, 'userid')->widget(Select2::classname(), [
        'data' => User::find()->select(['nickname','id'])->orderBy('id')->indexBy('id')->column(),
        'language' => 'zh-CN',
        'options' => ['placeholder' => '请选择评论人'],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ]); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
