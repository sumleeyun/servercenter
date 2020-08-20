<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\license;

/**
 * licenseSearch represents the model behind the search form of `app\models\license`.
 */
class licenseSearch extends license
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qua_all', 'qua_usad', 'qua_available', 'start_date', 'expire_date', 'operate_by', 'software_id'], 'integer'],
            [['software', 'description', 'license_detail', 'license_key', 'status', 'note'], 'safe'],
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
        $query = license::find();

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
            'qua_all' => $this->qua_all,
            'qua_usad' => $this->qua_usad,
            'qua_available' => $this->qua_available,
            'start_date' => $this->start_date,
            'expire_date' => $this->expire_date,
            'operate_by' => $this->operate_by,
            'software_id' => $this->software_id,
        ]);

        $query->andFilterWhere(['like', 'software', $this->software])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'license_detail', $this->license_detail])
            ->andFilterWhere(['like', 'license_key', $this->license_key])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
