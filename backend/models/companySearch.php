<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;

/**
 * companySearch represents the model behind the search form of `app\models\Company`.
 */
class companySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['C_id', 'C_name', 'C_tel', 'C_email', 'C_Comname'], 'safe'],
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
        $query = Company::find();

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
        $query->andFilterWhere(['like', 'C_id', $this->C_id])
            ->andFilterWhere(['like', 'C_name', $this->C_name])
            ->andFilterWhere(['like', 'C_tel', $this->C_tel])
            ->andFilterWhere(['like', 'C_email', $this->C_email])
            ->andFilterWhere(['like', 'C_Comname', $this->C_Comname]);

        return $dataProvider;
    }
}
