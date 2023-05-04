<?php
namespace app\modules\v1;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
    }
}