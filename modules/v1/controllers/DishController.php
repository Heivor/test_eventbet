<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Dishes;
use yii\rest\ActiveController;

class DishController extends ActiveController
{
    public $modelClass = Dishes::class;


}