<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel".
 *
 * @property int $channel_id
 * @property string $channel_name
 * @property string $channel_notes
 * @property int $active
 */
class support_Channel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel';
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
            [['channel_name'], 'required'],
            [['active'], 'integer'],
            [['channel_name'], 'string', 'max' => 200],
            [['channel_notes'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'channel_id' => 'Channel ID',
            'channel_name' => 'Channel Name',
            'channel_notes' => 'Channel Notes',
            'active' => 'Active',
        ];
    }
}
