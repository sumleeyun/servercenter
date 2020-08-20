<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblserverSoftware".
 *
 * @property int $id
 * @property int $server_id
 * @property int $prog_id
 * @property string $user
 * @property string $password
 * @property string $port
 * @property string $note
 */
class serverAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblserverSoftware';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id', 'prog_id', 'user', 'password', 'note'], 'required'],
            [['server_id', 'prog_id'], 'integer'],
            [['note'], 'string'],
            [['user', 'password', 'port'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'server_id' => 'Server ID',
            'prog_id' => 'Prog ID',
            'user' => 'User',
            'password' => 'Password',
            'port' => 'Port',
            'note' => 'Note',
        ];
    }
}
