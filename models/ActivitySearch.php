<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_activity', 'id_user', 'is_important', 'created_at', 'updated_at'], 'integer'],
            [['activity_name', 'activity_start_timestamp', 'activity_end_timestamp', 'place', 'body'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
//        $query = Activity::find()->select(Activity::tableName() . '.*, ' . User::tableName()  . '.login');
        $query = !isset($params['id_user']) ? Activity::find() : Activity::find()->where([Activity::tableName() . ".id_user" => $params['id_user']]);

        $query->innerJoin(User::tableName(), Activity::tableName(). '.id_user = ' . User::tableName()  . '.id_user');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_activity' => $this->id_activity,
            'activity_start_timestamp' => $this->activity_start_timestamp,
            'activity_end_timestamp' => $this->activity_end_timestamp,
            'id_user' => $this->id_user,
            'is_important' => $this->is_important,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'activity_name', $this->activity_name])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}
