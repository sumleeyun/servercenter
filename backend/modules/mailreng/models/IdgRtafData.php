<?php

namespace backend\modules\mailreng\models;

use Yii;

/**
 * This is the model class for table "idg_RtafData".
 *
 * @property int $id
 * @property string $IdCard
 * @property string $IdGvm
 * @property string $BirthDate
 * @property string $Name
 * @property int $Rank
 * @property int $Unit
 * @property int $Type
 * @property int $Enable
 * @property string $UpdateDate
 * @property string $CreateDate
 * @property string $Position
 * @property string $status
 */
class IdgRtafData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idg_RtafData';
    }

    
      
    public static function primaryKey()
{
    return ['id'];
}
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('mssql');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdCard', 'IdGvm', 'Name', 'Position', 'status'], 'string'],
            [['BirthDate', 'UpdateDate', 'CreateDate'], 'safe'],
            [['Rank', 'Unit', 'Type', 'Enable'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'IdCard' => 'Id Card',
            'IdGvm' => 'Id Gvm',
            'BirthDate' => 'Birth Date',
            'Name' => 'Name',
            'Rank' => 'Rank',
            'Unit' => 'Unit',
            'Type' => 'Type',
            'Enable' => 'Enable',
            'UpdateDate' => 'Update Date',
            'CreateDate' => 'Create Date',
            'Position' => 'Position',
            'status' => 'Status',
        ];
    }
    
    
     public function getUnitname() {
        return $this->hasOne(DboIdgunit::className(), ['Code' => 'Unit']);
    }
}
