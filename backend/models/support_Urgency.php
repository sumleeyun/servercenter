<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urgency".
 *
 * @property int $urgency_id
 * @property string $urgency_name
 * @property int $urgency_level
 * @property string $urgency_notes
 * @property int $active
 */
class support_Urgency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urgency';
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
            [['urgency_name', 'urgency_level'], 'required'],
            [['urgency_level', 'active'], 'integer'],
            [['urgency_name'], 'string', 'max' => 200],
            [['urgency_notes'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'urgency_id' => 'Urgency ID',
            'urgency_name' => 'Urgency Name',
            'urgency_level' => 'Urgency Level',
            'urgency_notes' => 'Urgency Notes',
            'active' => 'Active',
        ];
    }
}
