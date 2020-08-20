<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $service_id
 * @property string $service_name
 * @property int $subtype_id
 * @property int $type_id
 * @property int $channel_id
 * @property int $url_id
 * @property int $worknum
 * @property string $notes
 * @property string $request_id
 * @property string $request_date
 * @property string $service_date
 * @property int $urgency_id
 * @property int $level_id
 * @property int $status_id
 * @property string $reserved
 * @property string $response_id
 */
class support_service extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'service';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('dbsupport');
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['service_name', 'subtype_id', 'type_id', 'channel_id', 'request_id', 'request_date', 'urgency_id', 'level_id', 'status_id'], 'required'],
            [['subtype_id', 'type_id', 'channel_id', 'url_id', 'worknum', 'urgency_id', 'level_id', 'status_id'], 'integer'],
            [['notes'], 'string'],
            [['request_date', 'service_date', 'reserved',], 'safe'],
            [['service_name'], 'string', 'max' => 150],
            [['request_id', 'reserved', 'response_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'service_id' => 'Service ID',
            'service_name' => 'เรือง',
            'subtype_id' => 'รายเอียดบริการ',
            'type_id' => 'ประเภทการให้บริการ',
            'channel_id' => 'ช่องทางติดต่อ',
            'url_id' => 'ชื่อเว็บไซต์ที่เกียวข้อง',
            'worknum' => 'จำนวนงาน',
            'notes' => 'รายละเอียด',
            'request_id' => 'ผู้แจ้งเรือง',
            'request_date' => 'วันเวลาที่รับแจ้ง',
            'service_date' => 'วันปิดงาน',
            'urgency_id' => 'ระดับความเร่งด่วน',
            'level_id' => 'Level_id',
            'status_id' => 'สถานะภาพ',
            'reserved' => 'Reserved',
            'response_id' => 'ผู้ปิดเรือง',
        ];
    }

    
    public function getAccuser() {
        return Yii::$app->user->identity->username;
        
    }
    
    public function getService_type() {
        return $this->hasOne(support_service_type::className(), ['type_id' => 'type_id']);
    }

    public function getService_subtype() {
        return $this->hasOne(support_service_subtype::className(), ['subtype_id' => 'subtype_id']);
    }

    public function getService_Channel() {
        return $this->hasOne(support_Channel::className(), ['channel_id' => 'channel_id']);
    }

    public function getService_Url() {
        return $this->hasOne(support_Url::className(), ['url_id' => 'url_id']);
    }

    public function getService_status() {
        return $this->hasOne(support_Status::className(), ['status_id' => 'status_id']);
    }

    //ข้อมูลทั้งหมด ของ แต่ละคนที่แจ้ง
    public function getServiceCount() {

        return support_service::find()->where(['request_id' => $this->request_id, 'type_id' => $this->type_id])->andWhere(['like', 'request_date', $this->request_date])->count();
    }

    public function getTypeCount() {

        return support_service_type::find()->all();
    }

    public function TCount($ch) {

        return support_service::find()->where(['type_id' => $ch])->andWhere(['like', 'request_date', $this->request_date])->groupBy(['request_id'])->count();
    }

    public function getSubtypeCount($type) {
        $cnt = support_service::find()
                ->where(['type_id' => $type])
                ->count();


//       if ($request_id) {
//            $cnt->where(['type_id' => $type, 'request_id' => $request_id])->count();
//        }
//        
//        if ($type) {
//            $cnt->where(['type_id' => $type])->count();
//        }

        return $cnt;
    }

    public function getUserRequest() {
        return support_service::find()->select(['request_id'])->groupBy(['request_id'])->indexBy('request_id')->column();
    }

    public function getListType() {

        return app\models\support_service_type::find()->select(['type_name', 'type_id'])->indexBy('type_id')->column();
    }

    public function getListsubType() {
        return app\models\support_service_subtype::find()->select(['subtype_name', 'subtype_id'])->indexBy('subtype_id')->column();
    }

//ส่งค่า type_id  มาทำการเช็ค ว่า
    public function getListUrl($ch) {
        switch ($ch):
            case 2 or 3 or 4:
                return Website::find()->select(['URL', 'id'])->indexBy('id')->column();
                break;

            case 5 or 6 :
                return app\models\TblServerall::find()->select(['IpServer'])->indexBy('IpServer')->column();
                break;

            default:

                return app\models\support_Url::find()->select(['url_name', 'url_id'])->indexBy('url_id')->column();
        endswitch;
    }

}
