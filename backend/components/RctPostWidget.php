<?php
namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctPostWidget extends Widget
{
    public $recentlypost;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $postString='';
        
        foreach ($this->recentlypost as $contents)
        {
            $postString.='<tr>
            <td>'.Html::encode($contents->id).'</td>
            <td>'.Html::encode($contents->title).'</td>
            <td>'.Html::encode(date("Y-m-d H:i:s",$contents->create_time)).'</td>
            <td>'.Html::encode($contents->postAuthor->nickname).'</td>
            </tr>';
        }
        return  $postString;
    }
}