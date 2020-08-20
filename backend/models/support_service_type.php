<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_type".
 *
 * @property int $type_id
 * @property string $type_name
 * @property string $type_notes
 * @property int $active
 */
class support_service_type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_type';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbsupport');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name', 'type_notes'], 'required'],
            [['active'], 'integer'],
            [['type_name'], 'string', 'max' => 200],
            [['type_notes'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'type_notes' => 'Type Notes',
            'active' => 'Active',
        ];
    }
}
