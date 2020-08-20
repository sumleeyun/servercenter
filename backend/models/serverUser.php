<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblServeruser".
 *
 * @property int $id
 * @property string $ipServer
 * @property int $userSys_id
 */
class serverUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblServeruser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ipServer', 'userSys_id'], 'required'],
            [['userSys_id'], 'integer'],
            [['ipServer'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ipServer' => 'Ip Server',
            'userSys_id' => 'User Sys ID',
        ];
    }
}
