<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "server_type".
 *
 * @property int $server_type_id
 * @property string $server_type_name ชื่อประเภทไทย
 * @property string $server_type_name_eng ชื่อประเภทภาษาอังกฤ
 * @property string $server_type_note รายละเอียด
 */
class ServerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'server_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_type_note'], 'string'],
            [['server_type_name', 'server_type_name_eng'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'server_type_id' => 'Server Type ID',
            'server_type_name' => 'ชื่อประเภทภาษาไทย',
            'server_type_name_eng' => 'ชื่อประเภทภาษาอังกฤ',
            'server_type_note' => 'รายละเอียด',
        ];
    }
}
