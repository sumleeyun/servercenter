<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $prefix คำนำหน้า
 * @property string $name ชื่อ
 * @property string $position ตำแหน่ง
 * @property int $group_id หน่วยงาน
 * @property int $status สถานะ
 * @property string $date_by วันที่ตรวจสอบ
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'status_kms', 'status_social'], 'integer'],
            [['date_by'], 'safe'],
            [['prefix'], 'string', 'max' => 50],
            [['name','person_note'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prefix' => 'ยศ',
            'name' => 'ชื่อ',
            'position' => 'ตำแหน่ง',
            'group_id' => 'หน่วยงาน',
            'status_kms' => 'สถานะKMS',
             'status_social' => 'สถานะSocial',
            'date_by' => 'วันที่สถานะ',
            'person_note' => 'หมายเหตุ'
        ];
    }
    
    
     public  function getPergroup(){
        return $this->hasOne(Pergroup::className(), ['id' => 'group_id']);
    }
    
    public function getStatus($status=null){
        $arr= array('1'=>'เข้าแล้ว');
        if (!empty($stauts) && !empty($arr[$stauts])){
            return $arr[$stauts];
        }
        return $arr;
    }
    
    
    
}
