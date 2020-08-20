<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mailresto".
 *
 * @property int $id
 * @property string $email
 * @property string $dbmail
 * @property string $dbff
 * @property string $status
 * @property string $note
 * @property string $name_by
 * @property string $user_create
 * @property string $create_y
 */
class tblMailresto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mailresto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'dbmail', 'dbff', 'status', 'note', 'name_by', 'user_create'], 'required'],
            [['create_y'], 'safe'],
            [['email', 'dbmail', 'dbff', 'note', 'name_by', 'user_create'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'dbmail' => 'Dbmail',
            'dbff' => 'Dbff',
            'status' => 'Status',
            'note' => 'Note',
            'name_by' => 'Name By',
            'user_create' => 'User Create',
            'create_y' => 'Create Y',
        ];
    }
}
