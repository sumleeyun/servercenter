<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblvcenterhosts".
 *
 * @property int $id
 * @property int $server_id
 * @property string $ip
 * @property string $model
 * @property string $license
 * @property int $cpu
 * @property int $memory
 */
class vcenterhosts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblvcenterhosts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpu', 'memory'], 'integer'],
            [['ip'], 'required'],
            [['ip','server_id'], 'string', 'max' => 50],
            [['model', 'license'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'server_id' => 'IP SERVER VCENTER',
            'ip' => 'VM HOSTS',
            'model' => 'Model',
            'license' => 'License',
            'cpu' => 'Cpu',
            'memory' => 'Memory',
        ];
    }
    
    public  function getServervcenter(){
        return $this->hasOne(vcenterhosts::className(), ['server_id' => 'server_id']);
    }
}
