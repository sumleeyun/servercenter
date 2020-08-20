<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblCheckSecurity".
 *
 * @property int $check_id
 * @property string $server_ip IP Address
 * @property int $check_dns DNS check
 * @property int $check_ad AD  Check
 * @property int $check_antivirus antivirus
 * @property int $check_cypber cyber
 * @property string $created_at วันที่ตรวจสอบ
 * @property int $created_by จนท.ตรวจสอบ
 */
class TblCheckSecurity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblCheckSecurity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['check_dns', 'check_ad', 'check_antivirus', 'check_cypber', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['server_ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'check_id' => 'Check ID',
            'server_ip' => 'IP Address',
            'check_dns' => 'DNS check',
            'check_ad' => 'AD  Check',
            'check_antivirus' => 'antivirus',
            'check_cypber' => 'cyber',
            'created_at' => 'วันที่ตรวจสอบ',
            'created_by' => 'จนท.ตรวจสอบ',
        ];
    }
    
    
     public function getCheckname($idchk){
        return $this->hasOne(TblCheckName::className(),['id'=> $idchk]);
    }
    
}
