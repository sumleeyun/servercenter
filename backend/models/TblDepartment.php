<?php

namespace app\models;

use Yii;

use app\models\Components;
/**
 * This is the model class for table "tblDepartment".
 *
 * @property int $codeDepartment
 * @property string $nameDepartment
 * @property string $codeComponents
 */
class TblDepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblDepartment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameDepartment',], 'required'],
            [['nameDepartment'], 'string', 'max' => 200],
            [['initials'], 'string', 'max' => 200],
            [['codeComponents'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codeDepartment' => 'Code',
            'nameDepartment' => 'ชื่อหน่วยงาน',
            'initials' => 'ชื่อย่อ',
            'codeComponents' => 'ส่วนราชการ',
            'under' => 'หน่วยขึ้นตรง',
        ];
    }
    
    public function  getComponentsx(){
    
        return $this->hasone(Components::className(), ['code' => 'codeComponents']); 
    
    }
    
    public function  getUnder(){
    
        return $this->hasone(TblDepartment::className(), ['under' => 'codeDepartment']); 
    
    }
}
     