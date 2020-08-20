<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblSystemsoftware;

/**
 * systemsoftwareSearch represents the model behind the search form of `app\models\TblSystemsoftware`.
 */
class systemsoftwareSearch extends TblSystemsoftware
{
    /**
     * {@inheritdoc}
     */
    public $q;


    public function rules()
    {
        return [
            [['id', 'pmvusers', 'adminsys', 'company_id', 'created_at','created_by', 'updated_at', 'updated_by'], 'integer'],
            [['systemname','q','system_dayjob'], 'safe'],
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
        $query = TblSystemsoftware::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                
                ],]
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
            'pmvusers' => $this->pmvusers,
            'adminsys' => $this->q,
            'company_id' => $this->company_id,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

       // $search_name="'%".str_replace(" ","%",$this->systemname)."%'";
        $query->andFilterWhere(['like', 'systemname',$this->systemname ]);
        
        $query->andFilterWhere(['like', 'systemENG', $this->q]);
         $query->andFilterWhere(['like', 'system_dayjob', $this->system_dayjob]);

        return $dataProvider;
    }
}
