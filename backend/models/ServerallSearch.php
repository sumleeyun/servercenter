<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblServerall;

/**
 * ServerallSearch represents the model behind the search form of `app\models\TblServerall`.
 */
class ServerallSearch extends TblServerall {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['IpServer', 'TypeServer','server_type_id', 'OS', 'program', 'computerName', 'hardware', 'systemsoftware_id', 'mapWithWapple', 'Description', 'tool', 'servicePort', 'subnetMask', 'gateway', 'status', 'user', 'pw', 'userPwAnother', 'remak1', 'remark2', 'adminServer', 'created_by', 'created_at', 'updated_at', 'update_by'], 'safe'],
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
    public function search($params) {
        $query = TblServerall::find();

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
            'created_by' => $this->created_by,
            'update_by' => $this->updated_by,
            'status' => $this->status,
            'systemsoftware_id' => $this->systemsoftware_id,
            'server_type_id' => $this->server_type_id,
            'program' => $this->program,
        ]);

        $query->andFilterWhere(['like', 'IpServer', $this->IpServer])
//                ->andFilterWhere(['like', 'TypeServer', $this->TypeServer])
                ->andFilterWhere(['like', 'OS', $this->OS])
//                ->andFilterWhere(['like', 'program', $this->program])
                ->andFilterWhere(['like', 'computerName', $this->computerName])
                ->andFilterWhere(['like', 'hardware', $this->hardware])
//                ->andFilterWhere(['like', 'systemsoftware_id', $this->systemsoftware_id])
                ->andFilterWhere(['like', 'mapWithWapple', $this->mapWithWapple])
                ->andFilterWhere(['like', 'Description', $this->Description])
                ->andFilterWhere(['like', 'tool', $this->tool])
                ->andFilterWhere(['like', 'servicePort', $this->servicePort])
                ->andFilterWhere(['like', 'subnetMask', $this->subnetMask])
                ->andFilterWhere(['like', 'gateway', $this->gateway])
//                ->andFilterWhere(['like', 'status', $this->status])
                ->andFilterWhere(['like', 'user', $this->user])
                ->andFilterWhere(['like', 'pw', $this->pw])
                ->andFilterWhere(['like', 'userPwAnother', $this->userPwAnother])
                ->andFilterWhere(['like', 'remak1', $this->remak1])
                ->andFilterWhere(['like', 'remark2', $this->remark2])
                ->andFilterWhere(['like', 'adminServer', $this->adminServer]);

        return $dataProvider;
    }

}
