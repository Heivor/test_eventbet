<?php


namespace app\modules\v1\models;
use yii\base\Model;
use Yii;

class PopularCooksForm extends Model
{
    public $from;
    public $to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from','to'], 'string'],
            [['from','to'], 'required'],
        ];
    }

    public function getPopularCooks()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT COUNT(dc.dish_id) as num, dc.cook_id FROM checks as c
        left join checks_to_dishes as cd on c.id = cd.check_id
        left join dishes_to_cooks as dc on cd.dish_id = dc.dish_id where `created_at` BETWEEN :from AND :to group by dc.cook_id order by num DESC limit 5", [':from' => $this->from,':to' => $this->to]);
        $result = $command->queryAll();
        $cooks = \app\models\Cooks::find()->indexBy('id')->all();
        $data = [];
        foreach ($result as $cook) {
            $row['cook'] = $cooks[$cook['cook_id']]->name;
            $row['count'] = $cook['num'];
            $data[] = $row;
        }
        return $data;

    }


}