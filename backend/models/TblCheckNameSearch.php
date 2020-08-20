<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCheckName;

/**
 * TblCheckNameSearch represents the model behind the search form of `app\models\TblCheckName`.
 */
class TblCheckNameSearch extends TblCheckName
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'typechk_id'], 'integer'],
            [['check_name'], 'safe'],
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
        $query = TblCheckName::find();

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
            'id' => $this->id,
            'typechk_id' => $this->typechk_id,
        ]);

        $query->andFilterWhere(['like', 'check_name', $this->check_name]);

        return $dataProvider;
    }
}
