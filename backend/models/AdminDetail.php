<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adminDetail".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $Department
 * @property string $tel
 * @property string $email
 * @property string $block
 * @property string $sendEmail
 */
class AdminDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adminDetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['name', 'username', 'password', 'Department', 'tel', 'email'], 'required'],
            [['name', 'username', 'password'], 'string', 'max' => 150],
            [['Department'], 'string', 'max' => 20],
            [['tel', 'email'], 'string', 'max' => 50],
            [['block', 'sendEmail'], 'string', 'max' => 4],
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
            'username' => 'ตำแหน่ง',
            'password' => 'Password',
            'Department' => 'สังกัดหน่วยงาน',
            'tel' => 'Tel',
            'email' => 'Email',
            'block' => 'Block',
            'sendEmail' => 'Send Email',
        ];
    }
    
    public function  getDepartment(){
    
        return $this->hasone(TblDepartment::className(), ['codeDepartment' => 'Department']); 
    
    }
}
