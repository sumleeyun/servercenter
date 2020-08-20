<?php

namespace backend\modules\mailreng\models;

use Yii;

/**
 * This is the model class for table "dbo.idg_Rank".
 *
 * @property int $id
 * @property int $Code
 * @property string $Name
 * @property string $FullName
 * @property string $NameEng
 * @property string $FullNameEng
 * @property string $GroupName
 * @property string $Remark
 * @property int $Sort
 * @property string $Mailbox
 * @property int $sortrank
 * @property string $rankgroup
 * @property int $ranktype
 */
class Dboidg_rank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbo.idg_Rank';
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
            [['Code', 'Sort', 'sortrank', 'ranktype'], 'integer'],
            [['Name', 'FullName', 'NameEng', 'FullNameEng', 'GroupName', 'Remark', 'Mailbox', 'rankgroup'], 'string'],
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
            'NameEng' => 'Name Eng',
            'FullNameEng' => 'Full Name Eng',
            'GroupName' => 'Group Name',
            'Remark' => 'Remark',
            'Sort' => 'Sort',
            'Mailbox' => 'Mailbox',
            'sortrank' => 'Sortrank',
            'rankgroup' => 'Rankgroup',
            'ranktype' => 'Ranktype',
        ];
    }
}
