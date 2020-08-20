<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datastore".
 *
 * @property int $id
 * @property string $vcenter_id vcenter
 * @property string $name ชื่อdatastores
 * @property int $Capacity พื้นทั้งหมด
 * @property int $Provisioned_Space พื้นที่จอง
 * @property int $Free_Space พื้นที่เหลือ
 * @property string $Description รายละเอียด
 * @property string $Status สถานะ
 */
class Datastore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datastore';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Capacity', 'Provisioned_Space', 'Free_Space'], 'integer'],
            [['Description'], 'string'],
            [['vcenter_id', 'Status'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vcenter_id' => 'vcenter',
            'name' => 'ชื่อdatastores',
            'Capacity' => 'พื้นทั้งหมด',
            'Provisioned_Space' => 'พื้นที่จอง',
            'Free_Space' => 'พื้นที่เหลือ',
            'Description' => 'รายละเอียด',
            'Status' => 'สถานะ',
        ];
    }
}
