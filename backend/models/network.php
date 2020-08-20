<?php

namespace app\models;
use app\models\TblDepartment;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "tblNetwork".
 *
 * @property int $IP
 * @property string $userpc
 * @property int $dep_id
 * @property int $tel
 * @property int $chk
 * @property int $created_at
 */
class network extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblNetwork';
    }

    /**
     * {@inheritdoc}
     */
    
     public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
            //'updatedAtAttribute' => 'modified',
            //'value' => new Expression('NOW()'),
        ],
        /*[
              'class' => BlameableBehavior::className(),
              'createdByAttribute' => 'created_by',
              'updatedByAttribute' => 'modified_by',
          ],*/
    ];
}
    
    
    public function rules()
    {
        return [
            [['IP'], 'required'],
            [['IP', 'dep_id', 'tel', 'chk', 'created_at'], 'integer'],
            [['userpc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IP' => 'IP',
            'userpc' => 'ผู้ใช้เครื่อง',
            'dep_id' => 'หน่วยงาน',
            'tel' => 'Tel',
            'chk' => 'รูปแบบการเช็ค',
            'created_at' => 'Created At',
        ];
    }
    
    public function getDepartment() {
        
        return @$this->hasOne(TblDepartment::className(), ['dep_id' => 'codeDepartment']);
        
    }
}
