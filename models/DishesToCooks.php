<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishes_to_cooks".
 *
 * @property int $cook_id
 * @property int $dish_id
 */
class DishesToCooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishes_to_cooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cook_id', 'dish_id'], 'required'],
            [['cook_id', 'dish_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cook_id' => 'Cook ID',
            'dish_id' => 'Dish ID',
        ];
    }
}
