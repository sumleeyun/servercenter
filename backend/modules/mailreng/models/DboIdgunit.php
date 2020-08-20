<?php

namespace backend\modules\mailreng\models;

use Yii;

/**
 * This is the model class for table "dbo.idg_Unit".
 *
 * @property int $id
 * @property int $Code
 * @property string $Name
 * @property string $FullName
 * @property int $SubCode
 * @property int $Sort
 * @property int $Level
 * @property string $OUName
 * @property string $GroupName
 * @property string $Remark
 */
class DboIdgunit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbo.idg_Unit';
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
            [['Code', 'SubCode', 'Sort', 'Level'], 'integer'],
            [['Name', 'FullName', 'OUName', 'GroupName', 'Remark'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Code' => 'Code',
            'Name' => 'Name',
            'FullName' => 'Full Name',
            'SubCode' => 'Sub Code',
            'Sort' => 'Sort',
            'Level' => 'Level',
            'OUName' => 'Ouname',
            'GroupName' => 'Group Name',
            'Remark' => 'Remark',
        ];
    }
}
