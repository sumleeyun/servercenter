<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblNetwork".
 *
 * @property int $id
 * @property string $ipaddress
 * @property string $subnet
 * @property string $gateway
 * @property string $dns
 * @property string $note
 */
class Network extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblNetwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ipaddress', 'subnet', 'gateway', 'dns', 'note'], 'required'],
            [['note'], 'string'],
            [['ipaddress', 'subnet', 'gateway', 'dns'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ipaddress' => 'Ipaddress',
            'subnet' => 'Subnet',
            'gateway' => 'Gateway',
            'dns' => 'Dns',
            'note' => 'Note',
        ];
    }
}
