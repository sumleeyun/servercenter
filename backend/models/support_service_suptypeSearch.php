<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\support_service_subtype;

/**
 * support_service_typeSearch represents the model behind the search form of `app\models\support_service_type`.
 */
class support_service_suptypeSearch extends support_service_subtype
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'active'], 'integer'],
             [['subtype_name', 'type_id', 'subtype_notes'], 'safe'],
            
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
        $query = support_service_subtype::find();

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
            'subtype_id' => $this->subtype_id,
            'type_id' => $this->type_id,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'subtype_name', $this->subtype_name])
            ->andFilterWhere(['like', 'subtype_notes', $this->subtype_notes]);

        return $dataProvider;
    }
}
