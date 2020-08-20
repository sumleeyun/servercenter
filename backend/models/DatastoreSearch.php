<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datastore;

/**
 * DatastoreSearch represents the model behind the search form of `app\models\Datastore`.
 */
class DatastoreSearch extends Datastore
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Capacity', 'Provisioned_Space', 'Free_Space'], 'integer'],
            [['vcenter_id', 'name', 'Description', 'Status'], 'safe'],
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
        $query = Datastore::find();

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
            'Capacity' => $this->Capacity,
            'Provisioned_Space' => $this->Provisioned_Space,
            'Free_Space' => $this->Free_Space,
        ]);

        $query->andFilterWhere(['like', 'vcenter_id', $this->vcenter_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
