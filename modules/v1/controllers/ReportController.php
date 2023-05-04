<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Dishes;
use app\modules\v1\models\PopularCooksForm;
use yii\rest\Controller;
use Yii;

class ReportController extends Controller
{

    public function actionPopularCooks()
    {
        $popularCooks = new PopularCooksForm();
        $popularCooks->load(Yii::$app->request->bodyParams,'');
        if ($popularCooks->validate()) {
            return $popularCooks->getPopularCooks();
        }
        return $popularCooks;
    }

}