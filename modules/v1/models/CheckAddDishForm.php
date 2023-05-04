<?php


namespace app\modules\v1\models;
use yii\base\Model;

class CheckAddDishForm extends Model
{
    public $dishId;
    public $check;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dishId'], 'integer'],
        ];
    }

    public function add()
    {
        $dish = Menu::find()->where(['dish_id' => $this->dishId])->one();
        $checkToDishes = new ChecksToDishes();
        $checkToDishes->check_id = $this->check->id;
        $checkToDishes->dish_id = $dish->dish_id;
        $checkToDishes->save();
    }


}