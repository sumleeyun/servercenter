<?php

namespace backend\modules\mailreng\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

use backend\modules\mailreng\models\IdgRTAFPersons;

/**
 * idgRTAFPersonsSearch represents the model behind the search form of `app\models\IdgRTAFPersons`.
 */
class idgRTAFPersonsSearch extends IdgRTAFPersons
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_UID', 'person_IdCard', 'person_IdGvm', 'person_Fname', 'person_Lname', 'person_Fname_Eng', 'person_Lname_Eng', 'person_Birthdate', 'person_Position', 'person_Status', 'person_UpdateDate', 'person_CreateDate'], 'safe'],
            [['person_Rank_Code', 'person_Unit_Code'], 'integer'],
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
        $query = IdgRTAFPersons::find();

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
            'person_Birthdate' => $this->person_Birthdate,
            'person_Rank_Code' => $this->person_Rank_Code,
            'person_Unit_Code' => $this->person_Unit_Code,
            'person_UpdateDate' => $this->person_UpdateDate,
            'person_CreateDate' => $this->person_CreateDate,
        ]);

        $query->andFilterWhere(['like', 'person_UID', $this->person_UID])
            ->andFilterWhere(['like', 'person_IdCard', $this->person_IdCard])
            ->andFilterWhere(['like', 'person_IdGvm', $this->person_IdGvm])
            ->andFilterWhere(['like', 'person_Fname', $this->person_Fname])
            ->andFilterWhere(['like', 'person_Lname', $this->person_Lname])
            ->andFilterWhere(['like', 'person_Fname_Eng', $this->person_Fname_Eng])
            ->andFilterWhere(['like', 'person_Lname_Eng', $this->person_Lname_Eng])
            ->andFilterWhere(['like', 'person_Position', $this->person_Position])
            ->andFilterWhere(['like', 'person_Status', $this->person_Status]);

        return $dataProvider;
    }
}
