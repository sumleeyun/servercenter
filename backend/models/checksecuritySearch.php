<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCheckSecurity;

/**
 * checksecuritySearch represents the model behind the search form of `app\models\TblCheckSecurity`.
 */
class checksecuritySearch extends TblCheckSecurity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['check_id', 'check_dns', 'check_ad', 'check_antivirus', 'check_cypber', 'created_by'], 'integer'],
            [['server_ip', 'created_at'], 'safe'],
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
        $query = TblCheckSecurity::find();

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
            'check_id' => $this->check_id,
            'check_dns' => $this->check_dns,
            'check_ad' => $this->check_ad,
            'check_antivirus' => $this->check_antivirus,
            'check_cypber' => $this->check_cypber,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'server_ip', $this->server_ip]);

        return $dataProvider;
    }
}
