<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks_to_dishes".
 *
 * @property int $check_id
 * @property int $dish_id
 */
class ChecksToDishes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks_to_dishes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['check_id', 'dish_id'], 'required'],
            [['check_id', 'dish_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'check_id' => 'Check ID',
            'dish_id' => 'Dish ID',
        ];
    }
}
