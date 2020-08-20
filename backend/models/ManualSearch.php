<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Manual;

/**
 * ManualSearch represents the model behind the search form of `app\models\Manual`.
 */
class ManualSearch extends Manual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manual_id'], 'integer'],
            [['manal_url', 'note'], 'safe'],
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
        $query = Manual::find();

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
            'manual_id' => $this->manual_id,
        ]);

        $query->andFilterWhere(['like', 'manal_url', $this->manal_url])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
