<?php

namespace backend\modules\mailreng\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\mailreng\models\DboiduserSearch;

/**
 * DboiduserSearch represents the model behind the search form of `app\models\Dboidguser`.
 */
class DboiduserSearch extends Dboidguser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Rank', 'Unit', 'Format', 'Question', 'ADStatus', 'MailStatus', 'Type', 'Type_Rank', 'Permission', 'Division', 'WorkingYear', 'WorkingRank', 'PosAction'], 'integer'],
            [['Email', 'IdCard', 'IdGvm', 'BirthDate', 'FirstName', 'LastName', 'FirstNameEn', 'LastNameEn', 'Password', 'Answer', 'Position', 'UserName', 'Name', 'Tel', 'UpdateDate', 'CreateDate', 'Remark', 'PasswordOld', 'SecEmail', 'status'], 'safe'],
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
        $query = Dboidguser::find();

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
            'BirthDate' => $this->BirthDate,
            'Rank' => $this->Rank,
            'Unit' => $this->Unit,
            'Format' => $this->Format,
            'Question' => $this->Question,
            'ADStatus' => $this->ADStatus,
            'MailStatus' => $this->MailStatus,
            'Type' => $this->Type,
            'Type_Rank' => $this->Type_Rank,
            'UpdateDate' => $this->UpdateDate,
            'CreateDate' => $this->CreateDate,
            'Permission' => $this->Permission,
            'Division' => $this->Division,
            'WorkingYear' => $this->WorkingYear,
            'WorkingRank' => $this->WorkingRank,
            'PosAction' => $this->PosAction,
        ]);

        $query->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'IdCard', $this->IdCard])
            ->andFilterWhere(['like', 'IdGvm', $this->IdGvm])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'FirstNameEn', $this->FirstNameEn])
            ->andFilterWhere(['like', 'LastNameEn', $this->LastNameEn])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Answer', $this->Answer])
            ->andFilterWhere(['like', 'Position', $this->Position])
            ->andFilterWhere(['like', 'UserName', $this->UserName])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Tel', $this->Tel])
            ->andFilterWhere(['like', 'Remark', $this->Remark])
            ->andFilterWhere(['like', 'PasswordOld', $this->PasswordOld])
            ->andFilterWhere(['like', 'SecEmail', $this->SecEmail])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
