<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServerType;

/**
 * servertypeSearch represents the model behind the search form of `app\models\ServerType`.
 */
class servertypeSearch extends ServerType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_type_id'], 'integer'],
            [['server_type_name', 'server_type_name_eng', 'server_type_note'], 'safe'],
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
        $query = ServerType::find();

        // add conditions that should always apply here

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
            'server_type_id' => $this->server_type_id,
        ]);

        $query->andFilterWhere(['like', 'server_type_name', $this->server_type_name])
            ->andFilterWhere(['like', 'server_type_name_eng', $this->server_type_name_eng])
            ->andFilterWhere(['like', 'server_type_note', $this->server_type_note]);

        return $dataProvider;
    }
}
