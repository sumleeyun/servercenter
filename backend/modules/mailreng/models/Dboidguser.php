<?php

namespace backend\modules\mailreng\models;

use Yii;

/**
 * This is the model class for table "dbo.idg_User".
 *
 * @property int $id
 * @property string $Email
 * @property string $IdCard
 * @property string $IdGvm
 * @property string $BirthDate
 * @property string $FirstName
 * @property string $LastName
 * @property string $FirstNameEn
 * @property string $LastNameEn
 * @property int $Rank
 * @property int $Unit
 * @property string $Password
 * @property int $Format
 * @property int $Question
 * @property string $Answer
 * @property string $Position
 * @property string $UserName
 * @property string $Name
 * @property int $ADStatus
 * @property int $MailStatus
 * @property int $Type
 * @property string $Tel
 * @property int $Type_Rank
 * @property string $UpdateDate
 * @property string $CreateDate
 * @property string $Remark
 * @property string $PasswordOld
 * @property int $Permission
 * @property int $Division
 * @property int $WorkingYear
 * @property int $WorkingRank
 * @property int $PosAction
 * @property string $SecEmail
 * @property string $status
 */
class Dboidguser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbo.idg_User';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('mssql');
    }

//public function getPrimaryKey($asArray=false){
//    return ['id'];
//}
    
    public static function primaryKey()
{
    return ['id'];
}
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Email', 'IdCard', 'IdGvm', 'FirstName', 'LastName', 'FirstNameEn', 'LastNameEn', 'Password', 'Answer', 'Position', 'UserName', 'Name', 'Tel', 'Remark', 'PasswordOld', 'SecEmail', 'status'], 'string'],
            [['BirthDate', 'UpdateDate', 'CreateDate'], 'safe'],
            [['Rank', 'Unit', 'Format', 'Question', 'ADStatus', 'MailStatus', 'Type', 'Type_Rank', 'Permission', 'Division', 'WorkingYear', 'WorkingRank', 'PosAction'], 'integer'],
        ];
    }
    
    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Email' => 'Email',
            'IdCard' => 'Id Card',
            'IdGvm' => 'Id Gvm',
            'BirthDate' => 'Birth Date',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'FirstNameEn' => 'First Name En',
            'LastNameEn' => 'Last Name En',
            'Rank' => 'Rank',
            'Unit' => 'Unit',
            'Password' => 'Password',
            'Format' => 'Format',
            'Question' => 'Question',
            'Answer' => 'Answer',
            'Position' => 'Position',
            'UserName' => 'User Name',
            'Name' => 'Name',
            'ADStatus' => 'Adstatus',
            'MailStatus' => 'Mail Status',
            'Type' => 'Type',
            'Tel' => 'Tel',
            'Type_Rank' => 'Type  Rank',
            'UpdateDate' => 'Update Date',
            'CreateDate' => 'Create Date',
            'Remark' => 'Remark',
            'PasswordOld' => 'Password Old',
            'Permission' => 'Permission',
            'Division' => 'Division',
            'WorkingYear' => 'Working Year',
            'WorkingRank' => 'Working Rank',
            'PosAction' => 'Pos Action',
            'SecEmail' => 'Sec Email',
            'status' => 'Status',
        ];
    }
    
     public function getUnitname() {
        return $this->hasOne(DboIdgunit::className(), ['Code' => 'Unit']);
    }
    
      public function getRankrtaf() {
        return $this->hasOne(Dboidg_rank::className(), ['Code' => 'Rank']);
    }
    
    public function getRtafdata() {
        return $this->hasOne(IdgRTAFPersons::className(), [
            'person_IdCard' => 'IdCard',
            'person_IdGvm' => 'IdGvm',
            
            ]);
    }
    
     public function getRankname() {
          //$rank1=$this->rank->Name;
         $rname = $this->rankrtaf->Name;
          
        return  $rname ;
    }
    
     public function getListUnit() {
          //$rank1=$this->rank->Name;
         
          
        return  ArrayHelper::map(DboIdgunit::find()->asArray()->all(), 'Code', 'FullName');
    }
    
    
      public function getFullname() {
          //$rank1=$this->rankname;
         $fullname = $this->FirstName.' '.$this->LastName;
          
        return  $fullname ;
    }
}
