<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tblSystemsoftware".
 *
 * @property int $id
 * @property string $systemname ชื่อระบบงาน
 * @property string $systemENG ชื่อภาษาอังกกฤ
 * @property string $photo
 * @property string $rack
 * @property string $u_no
 * @property string $room
 * @property int $pmvusers หน่วงานรับผิดชอบ
 * @property int $adminsys ผู้ติดต่อประสานงาน
 * @property string $system_dayjob วันที่ติดตั้งระบบ
 * @property int $company_id บริษัทผู้ขาย
 * @property string $created_at วันที่สร้าง
 * @property int $created_by
 * @property int $updated_at วันที่อัพเดรตระบบ
 * @property int $updated_by ผู้กรอกระบบ
 * @property text remak รายละเลียด
 */
class TblSystemsoftware extends \yii\db\ActiveRecord
{
    
    public $upload_foler = 'uploads';
     public  $q;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSystemsoftware';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pmvusers', 'adminsys', 'company_id', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['system_dayjob','remak'], 'safe'],
            [['systemname', 'systemENG', 'photo', 'rack'], 'string', 'max' => 200],
            [['u_no', 'created_at'], 'string', 'max' => 100],
            [['room'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'systemname' => 'ชื่อระบบงาน',
            'systemENG' => 'ชื่อภาษาอังกกฤ',
            'photo' => 'Photo',
            'rack' => 'Rack',
            'u_no' => 'U No',
            'room' => 'Room',
            'pmvusers' => 'หน่วงานรับผิดชอบ',
            'adminsys' => 'ผู้ติดต่อประสานงาน',
            'system_dayjob' => 'วันที่ติดตั้งระบบ',
            'company_id' => 'บริษัทผู้ขาย',
            'created_at' => 'วันที่สร้าง',
            'created_by' => 'Created By',
            'updated_at' => 'วันที่อัพเดรตระบบ',
            'updated_by' => 'ผู้กรอกระบบ',
            'remak' => 'รายละเอียด',
        ];
    }
    
    public function behaviors(){
      return [
        BlameableBehavior::className(),
       [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
            'updatedAtAttribute' => 'updated_at',
            'value' => new Expression('NOW()'),
        ],
      ];
    }
    
      public function getWebHosting(){
        return $this->hasMany(Website::className(),['systemsoftware_id'=> 'id']);
    }
    
    
    public function getServer(){
        return $this->hasMany(TblServerall::className(),['systemsoftware_id'=> 'id']);
    }
    
    // user การเข้าใช้ระบบซึ่งมีมากว่า 1 user
     public function getUserAccount(){
        return $this->hasMany(TblUserSystem::className(),['software_id'=> 'id']);
    }
    
    public function getUnitrtaf() {
         return $this->hasOne(TblDepartment::className(),['codeDepartment'=> 'pmvusers']);
    }
    public function getWork() {
         return $this->hasOne(Tblwork::className(),['server_ip'=> 'id']);
    }
    public function getAdminName() {
         return $this->hasOne(AdminDetail::className(),['id'=> 'adminsys']);
    }
    public function getCompany() {
         return $this->hasOne(Company::className(),['id'=> 'company_id']);
    }
    
    public function getListAdmin() {
         return AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getListCompany() {
         return Company::find()->select(['company_nameT', 'id'])->indexBy('id')->column();
    }
    
    public function getListDep() {
         return TblDepartment::find()->select(['nameDepartment', 'codeDepartment'])->indexBy('codeDepartment')->column();
    }
    
    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            $fileName = $photo->baseName . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer() {
        return empty($this->photo) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->photo;
    }
    
}
