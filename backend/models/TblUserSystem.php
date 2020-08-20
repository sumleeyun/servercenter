<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tblUserSystem".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $block
 * @property string $note
 * @property int $created_at
 * @property int $update_at
 * @property int $created_by
 * @property int $update_by
 */
class TblUserSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblUserSystem';
    }

    
    public function behaviors() {
        return [
        [
            'class' => TimestampBehavior::className(),
            'value' => new Expression('NOW()'),
        ],
        [
              'class' => BlameableBehavior::className()
              
          ],
    ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['name', 'username', 'password', 'block', 'note', 'created_at', 'update_at', 'created_by', 'update_by'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by','software_id'], 'integer'],
            [['name', 'username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 100],
            [['block'], 'string', 'max' => 4],
            [['note'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'software_id' => 'ระบบงาน',
            'name' => '	Url Menu',
            'username' => 'Username',
            'password' => 'Password',
            'block' => 'Block',
            'note' => 'Note',
            'created_at' => 'Created At',
            'updated_at' => 'Update At',
            'created_by' => 'Created By',
            'updated_by' => 'Update By',
        ];
    }
    
     public function getSystem() {
        //$system_id = '';
//        if ($system_id) {
//            $listSystem = TblSystemsoftware::find()->select(['systemname', 'id'])
//                    ->where(['id' => $system_id])
//                    ->indexBy('id')
//                    ->column();
//        } else {
            $listSystem = TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();
//        }
        return $listSystem;
    }
    
    public function getSystemsoftware() {
        return $this->hasOne(TblSystemsoftware::className(), ['id' => 'software_id']);
    }
    
}
