<?php

namespace backend\modules\mailreng\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

use backend\modules\mailreng\models\IdgRtafData;

/**
 * idgRtafdataSearch represents the model behind the search form of `app\models\IdgRtafData`.
 */
class idgRtafdataSearch extends IdgRtafData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Rank', 'Unit', 'Type', 'Enable'], 'integer'],
            [['IdCard', 'IdGvm', 'BirthDate', 'Name', 'UpdateDate', 'CreateDate', 'Position', 'status'], 'safe'],
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
        $query = IdgRtafData::find();

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
            'BirthDate' => $this->BirthDate,
            'Rank' => $this->Rank,
            'Unit' => $this->Unit,
            'Type' => $this->Type,
            'Enable' => $this->Enable,
            'UpdateDate' => $this->UpdateDate,
            'CreateDate' => $this->CreateDate,
        ]);

        $query->andFilterWhere(['like', 'IdCard', $this->IdCard])
            ->andFilterWhere(['like', 'IdGvm', $this->IdGvm])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Position', $this->Position])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
