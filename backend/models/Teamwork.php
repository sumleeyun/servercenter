<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teamwork".
 *
 * @property int $id
 * @property int $system_id ระบบงาน
 * @property int $admin_id ผู้ดูแล
 * @property int $job-description หน้าที่รับผิดชอบ
 */
class Teamwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teamwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_id', 'admin_id'], 'required'],
            [['system_id', 'admin_id'], 'integer'],
            [['job_description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_id' => 'ระบบงาน',
            'admin_id' => 'ผู้ดูแล',
            'job_description' => 'หน้าที่รับผิดชอบ',
        ];
    }
     public function  getAdmin(){
    
        return $this->hasOne(AdminDetail::className(), ['id' => 'admin_id']); 
    
    }
    
}
