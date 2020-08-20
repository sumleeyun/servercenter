<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Website;

/**
 * websiteSearch represents the model behind the search form of `app\models\Website`.
 */
class websiteSearch extends Website
{
    /**
     * {@inheritdoc}
     */
    public $q;
     public $domainName;
     
    public function rules()
    {
        return [
            [['id', 'URL', 'short_remarks', 'ipServer', 'ipMapServer', 'history1', 'history2', 'history3', 'Department', 'status', 'software','program_id', 'software_detail', 'userweb', 'pwdweb', 'userFtp', 'pwdFtp', 'dbName', 'userDb', 'pwdDb', 'created', 'created_by', 'modified', 'modified_by','q','domainName','url_perfix'], 'safe'],
            [['adminDetail'], 'integer'],
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
        $query = Website::find();

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
             'status' => $this->status,
             'program_id' => $this->program_id,
             'Department' => $this->Department,
            'adminDetail' => $this->adminDetail,
           
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'URL', $this->URL])
                ->andFilterWhere(['like', 'url_perfix', $this->url_perfix])
            ->andFilterWhere(['like', 'short_remarks', $this->short_remarks])
            //->andFilterWhere(['like', 'ipServer', $this->q])
            //->andFilterWhere(['like', 'ipMapServer', $this->q])
                
                 ->andFilterWhere(['like', 'ipServer', $this->ipServer])
                ->andFilterWhere(['like', 'ipMapServer', $this->ipMapServer])
            
            ->andFilterWhere(['like', 'history1', $this->history1])
            ->andFilterWhere(['like', 'history2', $this->history2])
            ->andFilterWhere(['like', 'history3', $this->history3])
//            ->andFilterWhere(['like', 'Department', $this->Department])
//            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'software', $this->software])
            ->andFilterWhere(['like', 'software_detail', $this->software_detail])
            ->andFilterWhere(['like', 'userweb', $this->userweb])
            ->andFilterWhere(['like', 'pwdweb', $this->pwdweb])
            ->andFilterWhere(['like', 'userFtp', $this->userFtp])
            ->andFilterWhere(['like', 'pwdFtp', $this->pwdFtp])
            ->andFilterWhere(['like', 'dbName', $this->dbName])
            ->andFilterWhere(['like', 'userDb', $this->userDb])
            ->andFilterWhere(['like', 'pwdDb', $this->pwdDb])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by])
            ->andFilterWhere(['like', 'domainName', $this->domainName])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'modified', $this->modified]);
        

        return $dataProvider;
    }
}
