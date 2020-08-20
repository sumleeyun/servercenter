<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;



/**
 * This is the model class for table "website".
 *
 * @property int $id
 * @property string $url_perfix
 * @property string $url_sub
 * @property string $URL
 * @property string $history3 ชื่อระบบงานภาษาไทย
 * @property string $short_remarks
 * @property string $ipServer
 * @property string $ipMapServer
 * @property string $history1
 * @property string $history2
 * @property string $Department
 * @property int $adminDetail
 * @property string $status
 * @property int $chk_id
 * @property string $software
 * @property int $program_id โปรแกรม
 * @property string $software_detail
 * @property string $userweb
 * @property string $pwdweb
 * @property string $userFtp
 * @property string $pwdFtp
 * @property string $dbName
 * @property string $userDb
 * @property string $pwdDb
 * @property string $created
 * @property string $created_by
 * @property string $modified
 * @property string $modified_by
 * @property int $admin_id
 */
class Website extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'website';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short_remarks'], 'string'],
            [['adminDetail', 'chk_id', 'program_id', 'admin_id','product_id'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['created_by', 'modified', 'modified_by', 'admin_id'], 'safe'],
            [['url_perfix', 'created_by', 'modified_by'], 'string', 'max' => 50],
            [['url_sub'], 'string', 'max' => 100],
            [['URL'], 'string', 'max' => 77],
            [['history3', 'history1', 'history2'], 'string', 'max' => 255],
            [['ipServer', 'ipMapServer'], 'string', 'max' => 15],
            [['Department', 'userDb'], 'string', 'max' => 42],
            [['status'], 'string', 'max' => 92],
            [['software'], 'string', 'max' => 53],
            [['software_detail'], 'string', 'max' => 132],
            [['userweb'], 'string', 'max' => 24],
            [['pwdweb'], 'string', 'max' => 44],
            [['userFtp'], 'string', 'max' => 173],
            [['pwdFtp'], 'string', 'max' => 30],
            [['dbName'], 'string', 'max' => 104],
            [['pwdDb'], 'string', 'max' => 41],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url_perfix' => 'Url Perfix',
            'url_sub' => 'Url Sub',
            'URL' => 'Url',
            'history3' => 'ชื่อระบบงานภาษาไทย',
            'short_remarks' => 'Short Remarks',
            'ipServer' => 'Ip Server',
            'ipMapServer' => 'inter/intra',
            'history1' => 'History1',
            'history2' => 'History2',
            'Department' => 'Department',
            'adminDetail' => 'Admin Detail',
            'status' => 'Status',
            'chk_id' => 'Chk ID',
            'software' => 'Software',
            'program_id' => 'โปรแกรม',
            'software_detail' => 'Software Detail',
            'userweb' => 'Userweb',
            'pwdweb' => 'Pwdweb',
            'userFtp' => 'User Ftp',
            'pwdFtp' => 'Pwd Ftp',
            'dbName' => 'Db Name',
            'userDb' => 'User Db',
            'pwdDb' => 'Pwd Db',
            'created' => 'Created',
            'created_by' => 'Created By',
            'modified' => 'Modified',
            'modified_by' => 'Modified By',
            'admin_id' => 'Admin ID',
            'product_id' => 'ระบบงาน',
        ];
    }
    
    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created',
            'updatedAtAttribute' => 'modified',
            'value' => new Expression('NOW()'),
        ],
        [
              'class' => BlameableBehavior::className(),
              'createdByAttribute' => 'created_by',
              'updatedByAttribute' => 'modified_by',
          ],
    ];
}
    public function getUserCreated() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'created_by']);
    }
    
      public function getUserUpdated() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'modified_by']);
    }
    
    public function getUserDetail(){
        return $this->hasOne(AdminDetail::className(), ['id' => 'adminDetail']);
    }
    
    public  function getDepartment(){
        return $this->hasOne(TblDepartment::className(), ['codeDepartment' => 'Department']);
        
    }
     public  function getServer(){
        return $this->hasOne(TblServerall::className(), ['IpServer' => 'ipServer']);
    }
    
    // ตารางโปรแกรม
    public  function getProgram(){
        return $this->hasOne(program::className(), ['id' => 'program_id']);
    }
    // ชื่อโปรแกรมแบบรวม 
    public function ProName1() {
        
        return $this->program->name;  
    }
    
    
    public  function getStatus1(){
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }
    
    public function getProduct(){
        return $this->hasOne(TblSystemsoftware::className(),['id'=> 'product_id']);
    }
    
     public function getDomainName(){
         
         if ($this->url_sub !=''){$s ='.';}else{ $s=''; }
         
        return $this->url_perfix.$this->url_sub.$s.$this->URL  ;
         
    }
    
     public  function getStatusList(){
        return Status::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
     public  function getSystem($id){
         if($id){
             $data =TblSystemsoftware::find()->select(['systemname', 'id'])
                     ->where(['id'=>$id])
                     ->indexBy('id')->column();
             
         }else{
            $data =TblSystemsoftware::find()->select(['systemname', 'id'])->indexBy('id')->column(); 
             
         }
        return $data;
    }
    
     public function getLisServer($id) {
        $id = '';
        if ($id) {
            $data = \app\models\TblServerall::find()->select(['IpServer'])
                    ->where(['IpServer' => $id])
                    ->indexBy('IpServer')
                    ->column();
        } else {
            $data = \app\models\TblServerall::find()->select(['IpServer'])->indexBy('IpServer')->column();
        }
        return $data;
    }
    
    
    public function getChkdns(){
        
    $ip = gethostbyname($this->URL); 
    
       
      return $data;
        
    }
    
}
