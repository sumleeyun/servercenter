<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tblwork;

/**
 * TblworkSearch represents the model behind the search form of `app\models\Tblwork`.
 */
class TblworkSearch extends Tblwork {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'url_server', 'dep_id', 'Status', 'created_by'], 'integer'],
            [['server_ip', 'eadmin_sn', 'note', 'date_job', 'created_at','topic'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params,$chk) {
        $query = Tblwork::find();
if($chk==1){
    $query = $query->where(['Status'=>1]);
 
}
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                //'title' => SORT_ASC, 
                ]
            ],
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
            'url_server' => $this->url_server,
            'dep_id' => $this->dep_id,
            //'date_job' => $this->date_job,
            'Status' => $this->Status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'server_ip', $this->server_ip])
                ->andFilterWhere(['like', 'eadmin_sn', $this->eadmin_sn])
                ->andFilterWhere(['like', 'topic', $this->topic])
                ->andFilterWhere(['like', 'note', $this->note])
                ->andFilterWhere(['like', 'date_job', $this->date_job]);

        return $dataProvider;
    }

}
