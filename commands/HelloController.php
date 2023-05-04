<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Cooks;
use app\models\Dishes;
use app\models\DishesToCooks;
use app\models\Menu;
use yii\console\Controller;
use yii\console\ExitCode;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    public function actionAddData()
    {
        $columns = ['name'];

        $rows = [];
        $rows[] = [
            'name' => 'Иван',
        ];
        $rows[] = [
            'name' => 'Сергей',
        ];
        $rows[] = [
            'name' => 'Михаил',
        ];
        Yii::$app->db->createCommand()->batchInsert(Cooks::tableName(), $columns, $rows)->execute();

        $columns = ['title'];

        $rows = [];
        $rows[] = [
            'name' => 'Салат Цезарь',
        ];
        $rows[] = [
            'name' => 'Борщь',
        ];
        $rows[] = [
            'name' => 'Пирожок с Мясом',
        ];
        $rows[] = [
            'name' => 'Уха',
        ];

        Yii::$app->db->createCommand()->batchInsert(Dishes::tableName(), $columns, $rows)->execute();


        $columns = ['cook_id','dish_id'];

        $rows = [];
        $rows[] = [
            'cook_id' => '1',
            'dish_id' => '1',
        ];
        $rows[] = [
            'cook_id' => '1',
            'dish_id' => '2',
        ];
        $rows[] = [
            'cook_id' => '2',
            'dish_id' => '3',
        ];
        $rows[] = [
            'cook_id' => '3',
            'dish_id' => '4',
        ];

        Yii::$app->db->createCommand()->batchInsert(DishesToCooks::tableName(), $columns, $rows)->execute();



        return ExitCode::OK;
    }

    public function actionAddDishToMenu()
    {
        $columns = ['dish_id'];
        $rows = [];
        $rows[] = [
            'dish_id' => '1',
        ];
        $rows[] = [
            'dish_id' => '2',
        ];
        $rows[] = [
            'dish_id' => '3',
        ];
        $rows[] = [
            'dish_id' => '4',
        ];
        Yii::$app->db->createCommand()->batchInsert(Menu::tableName(), $columns, $rows)->execute();

        return ExitCode::OK;
    }
}
