<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\support_service;

/**
 * support_serviceSearch represents the model behind the search form of `app\models\support_service`.
 */
class support_serviceSearch extends support_service {

    /**
     * {@inheritdoc}
     */
    public $start;
    public $end;

    public function rules() {
        return [
            [['service_id', 'subtype_id', 'type_id', 'channel_id', 'url_id', 'worknum', 'urgency_id', 'level_id', 'status_id'], 'integer'],
            [['service_name', 'notes', 'request_id', 'request_date', 'service_date', 'reserved', 'response_id'], 'safe'],
            //['start', 'request_date', 'timestampAttribute' => 'start', 'format' => 'php:d/m/y'],
            //['end', 'request_date', 'timestampAttribute' => 'end', 'format' => 'php:d/m/y']
            [['start', 'end'], 'date', 'format' => 'yyyy-MM-dd'],
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
    public function search($params, $flag,$acc) {
//        if (!Yii::$app->user->isGuest){
//        $useracc = Yii::$app->user->identity->username; 
//    }
//    
        // add conditions that should always apply here
if($flag==1){$roll='SORT_DESC';
$query = support_service::find()->where(['request_id'=> $acc]);
} else {$roll='SORT_ASC';
  $query = support_service::find();  
}
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'service_id' => $roll,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0 = 1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'service_id' => $this->service_id,
            'subtype_id' => $this->subtype_id,
            'type_id' => $this->type_id,
            'channel_id' => $this->channel_id,
            'url_id' => $this->url_id,
            'worknum' => $this->worknum,
            //'request_date' => $this->request_date,
            'service_date' => $this->service_date,
            'urgency_id' => $this->urgency_id,
            'level_id' => $this->level_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'service_name', $this->service_name])
                ->andFilterWhere(['like', 'notes', $this->notes])
                ->andFilterWhere(['like', 'request_id', $this->request_id])
                ->andFilterWhere(['like', 'reserved', $this->reserved])
                ->andFilterWhere(['like', 'response_id', $this->response_id]);
        // ->andFilterWhere(['like', 'request_date', $this->request_date])
        if ($flag == 1) {
            $query->andFilterWhere(['between', 'request_date', $this->start, $this->end]);
            
        }
        //->groupBy(['request_id']);
        //->andFilterWhere(['>=', 'request_date', $this->start])
        //->andFilterWhere(['<=', 'request_date', $this->end]);
        //$query->groupBy('request_id');
        if ($flag == 2) {
            $query->andFilterWhere(['like', 'request_date', $this->request_date]);
            $query->groupBy('type_id');
        }

        return $dataProvider;
    }

}
