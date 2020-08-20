<?php

namespace backend\modules\capa\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;
//use backend\modules\mailreng\models\Dboidguser;
/**
 * This is the model class for table "capauser".
 *
 * @property int $id
 * @property string $username username
 * @property string $vpn vpn
 * @property string $otp otp
 * @property string $cyberark cyberark
 * @property int $program
 * @property int $channel  ช่องทางติดต่อ
 * @property string $note หมายเหตุ
 * @property int $check
 * @property int $updated_at
 * @property int $updated_by
 * @property int $created_at
 * @property int $created_by
 */
class Capauser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'capauser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program', 'check', 'updated_at','channel','updated_by', 'created_at', 'created_by'], 'integer'],
            [['note'], 'string'],
            [['username', 'cyberark'], 'string', 'max' => 100],
            [['vpn', 'otp'], 'string', 'max' => 20],
        ];
    }

     public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
//            'createdAtAttribute' => 'created',
//            'updatedAtAttribute' => 'modified',
//            'value' => new Expression('NOW()'),
        ],
        [
              'class' => BlameableBehavior::className(),
//              'createdByAttribute' => 'created_by',
//              'updatedByAttribute' => 'modified_by',
          ],
    ];
}
    
    
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'username',
            'vpn' => 'vpn',
            'otp' => 'otp',
            'cyberark' => 'cyberark',
            'program' => 'Program',
             'channel' => 'ช่องทางติดต่อ',
            'note' => 'หมายเหตุ',
            'check' => 'Check',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
    
    public function getUserRtaf() {
        return $this->hasOne(\app\models\Dboidguser::className(), ['UserName' => 'username']);
    }
    
    public function getSoftware() {
        return $this->hasOne(\app\models\TblSystemsoftware::className(), ['id' => 'program']);
    }
    
   public function getUserCreated() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'created_by']);
    }
 
   public function getChannelName() {
        return $this->hasOne(\app\models\support_Channel::className(), ['channel_id' => 'channel']);
    }
      
}
