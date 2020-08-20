<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use Yii;
use common\models\Region;
use yii\filters\AccessControl;
/**
 * This is the model class for table "tblwork".
 *
 * @property int $id
 * @property string $server_ip IP Address
 * @property int $url_server URL
 * @property int $dep_id หน่วยงาน
 * @property string $eadmin_sn เลขหนังสือราชการ
 * @property string $note หมายเหตุ
 * @property string $date_job วันรับงาน
 * @property string $created_at วันที่สร้าง
 * @property int $created_by สร้างโดย
 */
class Tblwork extends \yii\db\ActiveRecord {

    
    const UPLOAD_FOLDER = 'work';
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tblwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['url_server', 'dep_id', 'Status', 'created_by', 'updated_by'], 'integer'],
            [['note','topic'], 'string'],
            [['date_job', 'created_at', 'updated_at'], 'safe'],
            [['server_ip', 'eadmin_sn'], 'string', 'max' => 50],
        ];
    }

    public function behaviors() {
        return [
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            
                /* [
                  'class' => BlameableBehavior::className(),
                  'createdByAttribute' => 'created_by',
                  //'updatedByAttribute' => 'modified_by',
                  ], */
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
             'topic' => 'เรือง\โครงการ',
             'eadmin_sn' => 'เลขหนังสือราชการ/อื่นๆๆ',
             'collaborator' => 'ผู้ประสานสานงาน',
             'dep_id' => 'หน่วยงาน',
            'covenant' => 'file upload',
             'note' => 'รายละเอียด',
            
            'server_ip' => 'ระบบงาน',
            'url_server' => 'DNS',
          
            
            'Status' => 'สถานะงาน',
            'date_job' => 'วันสิ้นสุดงาน',
            'updated_at' => 'วันรับงาน',
            'updated_by' => 'ผู้รับงาน',
            'created_at' => 'วันที่ส่งงาน',
            'created_by' => 'ผู้ส่งงาน',
        ];
    }

    public function getProfile() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'updated_by']);
    }

    public function getDepartment() {
        return $this->hasOne(TblDepartment::className(), ['codeDepartment' => 'dep_id']);
    }

    public function getUrlname() {
        return $this->hasOne(Website::className(), ['id' => 'url_server']);
                //->via('serverdetail');
    }

    public function getSystemsoftware() {
        return $this->hasOne(TblSystemsoftware::className(), ['id' => 'server_ip']);
    }

    public function getServerdetail() {
        return $this->hasMany(TblServerall::className(),['systemsoftware_id' => 'server_ip'])
                -> orderby(['server_ip']); 

    }
    public function getItemStatus_work() {
        return self::itemsAlias('work');
    }
    
    //เพื่อให้สามารถเรียก path ที่เก็บไฟล์และ url ที่เก็บไฟล์ได้โดยเราจะสร้างฟังก์ชั่นชึ้นมา 2 ตัวคือ getUploadPath(),getUploadUrl()
    
    
    public static function getUploadPath(){
    return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
}

public static function getUploadUrl(){
    return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
}
    
    

}
