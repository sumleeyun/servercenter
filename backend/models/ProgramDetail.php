<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program_detail".
 *
 * @property int $id
 * @property string $ipaddress
 * @property int $program_id โปรแกรม
 * @property int $usersystem_id username password
 * @property string $accessRoute
 * @property string $note รายละเอียด
 */
class Programdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ipaddress'], 'required'],
            [['program_id', 'usersystem_id'], 'integer'],
            [['note'], 'string'],
            [['ipaddress', 'accessRoute'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ipaddress' => 'Ipaddress',
            'program_id' => 'โปรแกรม',
            'usersystem_id' => 'username password',
            'accessRoute' => 'Access Route',
            'note' => 'รายละเอียด',
        ];
    }
    
    public  function getProgram(){
        return $this->hasOne(program::className(), ['id' => 'program_id']);
    }
    
    public  function getAccount(){
        return $this->hasOne(TblUserSystem::className(), ['id' => 'usersystem_id']);
    }
    
    //รายชื่อ หน่วยงานในตาราง matraking // id_unit
    public function ProName1() {
        
        return $this->program->name;  
    }
}
