<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\CheckAddDishForm;
use app\modules\v1\models\Cooks;
use app\modules\v1\models\Checks;
use app\modules\v1\models\Dishes;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use function PHPUnit\Framework\throwException;

class CheckController extends Controller
{

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                    ]
                ],
            ]
        ]);
    }

    public function actionAdd()
    {
        $check = new \app\modules\v1\models\Checks();
        $check->save();
        return $check;
    }

    public function actionAddDish($id)
    {

        $check = Checks::findOne($id);
        if (!$check) {
            throw new NotFoundHttpException();
        }

        $dishForm = new CheckAddDishForm(['check' => $check]);
        $dishForm->load(Yii::$app->request->bodyParams,'');
        if ($dishForm->validate()) {
            $dishForm->add();
        }

        return $dishForm;
    }

}