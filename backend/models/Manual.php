<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manual".
 *
 * @property int $manual_id
 * @property string $manal_url
 * @property string $note
 */
class Manual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['manal_url', 'note'], 'required'],
            [['topic'], 'string'],
            [['note'], 'string'],
            [['manal_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manual_id' => 'Manual ID',
            'topic' => 'หัวเรือง',
            'manal_url' => 'Url',
            'note' => 'Note',
        ];
    }
}
