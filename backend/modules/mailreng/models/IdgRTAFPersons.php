<?php

namespace backend\modules\mailreng\models;

use Yii;

/**
 * This is the model class for table "idg_RTAF_Persons".
 *
 * @property string $person_UID
 * @property string $person_IdCard
 * @property string $person_IdGvm
 * @property string $person_Fname
 * @property string $person_Lname
 * @property string $person_Fname_Eng
 * @property string $person_Lname_Eng
 * @property string $person_Birthdate
 * @property string $person_Position
 * @property string $person_Status
 * @property int $person_Rank_Code
 * @property int $person_Unit_Code
 * @property string $person_UpdateDate
 * @property string $person_CreateDate
 */
class IdgRTAFPersons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idg_RTAF_Persons';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('mssql');
    }

    
      public static function primaryKey()
{
    return ['person_UID'];
}
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_UID'], 'required'],
            [['person_UID', 'person_IdCard', 'person_IdGvm', 'person_Fname', 'person_Lname', 'person_Fname_Eng', 'person_Lname_Eng', 'person_Position', 'person_Status'], 'string'],
            [['person_Birthdate', 'person_UpdateDate', 'person_CreateDate'], 'safe'],
            [['person_Rank_Code', 'person_Unit_Code'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_UID' => 'Person  Uid',
            'person_IdCard' => 'Person  Id Card',
            'person_IdGvm' => 'Person  Id Gvm',
            'person_Fname' => 'Person  Fname',
            'person_Lname' => 'Person  Lname',
            'person_Fname_Eng' => 'Person  Fname  Eng',
            'person_Lname_Eng' => 'Person  Lname  Eng',
            'person_Birthdate' => 'Person  Birthdate',
            'person_Position' => 'Person  Position',
            'person_Status' => 'Person  Status',
            'person_Rank_Code' => 'Person  Rank  Code',
            'person_Unit_Code' => 'Person  Unit  Code',
            'person_UpdateDate' => 'Person  Update Date',
            'person_CreateDate' => 'Person  Create Date',
        ];
    }
    
    
     public function getUnitname() {
        return $this->hasOne(DboIdgunit::className(), ['Code' => 'person_Unit_Code']);
    }
    
    
      public function getRankrtaf() {
        return $this->hasOne(\backend\models\Dboidg_rank::className(), ['Code' => 'person_Rank_Code']);
    }
}
