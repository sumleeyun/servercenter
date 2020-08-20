<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tblServerall".
 *
 * @property string $IpServer
 * @property string $TypeServer
 * @property string $OS
 * @property string $program
 * @property string $computerName
 * @property string $hardware
 * @property string $mapWithWapple
 * @property string $Description
 * @property string $tool
 * @property string $servicePort
 * @property string $subnetMask
 * @property string $gateway
 * @property string $status
 * @property string $user
 * @property string $pw
 * @property string $userPwAnother
 * @property string $remak1
 * @property string $remark2
 * @property string $adminServer
 * @property string $created_by
 * @property string $updated_user
 *  * @property string $chkstatus
 */
class TblServerall extends \yii\db\ActiveRecord {

    public $items;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tblServerall';
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
        ];
    }

    /**
     * {@inheritdoc}
     * ,'created_at','created_by','updated_at','updated_by'
     */
    public function rules() {
        return [
            [['IpServer'], 'required'],
            [['systemsoftware_id', 'chkstatus', 'server_type_id', 'capacity'], 'integer'],
            [['TypeServer', 'OS', 'program', 'items', 'computerName', 'hardware', 'vmhost_id', 'model', 'cpu', 'memory', 'harddisk', 'mapWithWapple', 'Description', 'tool', 'servicePort', 'subnetMask', 'gateway', 'status', 'user', 'pw', 'userPwAnother', 'remak1', 'remark2', 'adminServer',], 'string'],
            [['IpServer'], 'string', 'max' => 200],
            [['IpServer'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'systemsoftware_id' => 'ระบบงาน',
            'IpServer' => 'Ip Server',
            'mapWithWapple' => 'Map With Wapple',
            'subnetMask' => 'Subnet Mask',
            'gateway' => 'Gateway',
            'computerName' => 'Computer Name',
            'OS' => 'ระบบประฏิบัติการ',
            'user' => 'User',
            'pw' => 'Pw',
            'userPwAnother' => 'User Pw Another',
            'program' => 'Program',
            'tool' => 'Tool',
            'servicePort' => 'Service Port',
            'Description' => 'Description',
            'TypeServer' => 'Type Server',
            'server_type_id' => 'ประเภทเครืองแม่ข่าย',
            'hardware' => 'Hardware,colo,base,vm',
            'vmhost_id' => 'vmhost_id',
            'model' => 'model',
            'cpu' => 'cpu',
            'memory' => 'memory',
            'harddisk' => 'harddisk',
//            'systemsoftware_id',
            'status' => 'Status',
            'remak1' => 'Remak1',
            'remark2' => 'Remark2',
            'adminServer' => 'ผู้ดูแลระบบ',
            'chkstatus' => 'สถานะการตรวจสอบ',
            'capacity' => 'รายการตรวจเช็ค',
            'capacity_date' => 'วันที่ในการตรวจเช็ค',
            'created_at' => 'วันที่สร้าง',
            'created_by' => 'สร้างโดย',
            'updated_at' => 'วันที่อัพเดต',
            'updated_by' => 'แก้ไขโดย',
        ];
    }

    public function getUserCreated() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'created_by']);
    }

    public function getUserUpdated() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'updated_by']);
    }

    public function getVcenterhosts() {
        return $this->hasOne(vcenterhosts::className(), ['id' => 'vmhost_id']);
    }

    public function getAdmindetail() {
        return $this->hasOne(AdminDetail::className(), ['id' => 'adminServer']);
    }

    public function getSystemsoftware() {
        return $this->hasOne(TblSystemsoftware::className(), ['id' => 'systemsoftware_id']);
    }

    /* public function filterSoftware(){
      return ArrayHelper::map(app\models\TblSystemsoftware::find()->asArray()->all(), 'id', 'systemname') ;
      } */

    public function getWebsite() {
        return $this->hasMany(Website::className(), ['ipServer' => 'IpServer']);
    }

    public function getServertype() {
        return $this->hasOne(ServerType::className(), ['server_type_id' => 'server_type_id']);
    }

    public function getStatus1() {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    public function getCapacity() {
        return $this->hasOne(Status::className(), ['id' => 'capacity']);
    }

    public function getProDetail() {
        return $this->hasMany(Programdetail::className(), ['ipaddress' => 'IpServer']);
    }

    // ชื่อโปรแกรม  
    public function getproName() {
        return $this->hasOne(program::className(), ['id' => 'OS']);
        //->orderBy(['tracking_status_id' => SORT_DESC])
        //->via('programDetail');                             
    }

    //  widget select2 
    public function getStatusList() {
        return Status::find()->select(['name', 'id'])->indexBy('id')->column();
    }

    public function getAdmin() {
        return AdminDetail::find()->select(['name', 'id'])->indexBy('id')->column();
    }

    public function getType() {

        return ServerType::find()->select(['server_type_name', 'server_type_id'])->indexBy('server_type_id')->column();
    }

    public function getSystem($system_id) {
       // $system_id = '';
        if ($system_id) {
            $listSystem = TblSystemsoftware::find()->select(['systemname', 'id'])
                    ->where(['id' => $system_id])
                    ->indexBy('id')
                    ->column();
        } else {
            $listSystem = TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column();
        }
        return $listSystem;
    }

    public function getListVcenter() {
        return TblServerall::find()->select(['hardware'])->where(['server_type_id' => 2])->column();
    }

    public function getListOs() {
        return program::find()->select(['concat(name,version) as nameall','id'])
                ->where(['type' => 'os'])
                ->indexBy('id')
                ->column();
    }

    public function getListAccount() {
        return app\models\TblUserSystem::find()->select(['concat(username,password) as userpass', 'id'])->indexBy('id')->column();
    }

}
