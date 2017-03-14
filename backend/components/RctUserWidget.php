<?php
namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctUserWidget extends Widget
{
    public $recentlyuser;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $userString='';
        
        foreach ($this->recentlyuser as $contents)
        {
            $userString.='<tr>
            <td>'.Html::encode($contents->username).'</td>
            <td>'.Html::encode($contents->nickname).'</td>
            <td>'.Html::encode($contents->email).'</td>
            <td>'.Html::encode(date("Y-m-d H:i:s",$contents->created_at)).'</td>
            </tr>';
        }
        return  $userString;
    }
}