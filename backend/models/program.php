<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblprogram".
 *
 * @property int $id
 * @property string $name
 * @property string $version
 * @property string $type
 * @property string $note
 * @property int $active
 */
class program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblprogram';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note'], 'string'],
            [['active'], 'integer'],
            [['name', 'version', 'type','port'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'version' => 'Version',
            'type' => 'Type',
            'port' => 'port',
            'note' => 'Note',
            'active' => 'Active',
        ];
    }
}
