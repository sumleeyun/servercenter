<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\network;

/**
 * networkSearch represents the model behind the search form of `app\models\network`.
 */
class networkSearch extends network
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IP', 'dep_id', 'tel', 'chk', 'created_at'], 'integer'],
            [['userpc'], 'safe'],
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
        $query = network::find();

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
            'IP' => $this->IP,
            'dep_id' => $this->dep_id,
            'tel' => $this->tel,
            'chk' => $this->chk,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'userpc', $this->userpc]);

        return $dataProvider;
    }
}
