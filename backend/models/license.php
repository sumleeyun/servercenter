<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_license".
 *
 * @property int $id
 * @property string $software
 * @property string $description
 * @property int $qua_all จำนวนlincense
 * @property int $qua_usad ที่ใช้
 * @property int $qua_available คงเหลือ
 * @property string $license_detail
 * @property string $license_key lincense Key
 * @property int $start_date วันเริ่ม
 * @property int $expire_date วันหมดอายุ
 * @property string $status สถานะ
 * @property int $operate_by หน่วยงานรับผิดชอบ
 * @property string $note ืหมายเหตุ
 * @property int $software_id
 */
class license extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qua_all', 'qua_usad', 'qua_available', 'operate_by', 'software_id'], 'integer'],
            [['note','start_date', 'expire_date',], 'string'],
            [['software', 'description', 'license_detail', 'license_key'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'software' => 'Software',
            'description' => 'Description',
            'qua_all' => 'จำนวนlincense',
            'qua_usad' => 'ที่ใช้',
            'qua_available' => 'คงเหลือ',
            'license_detail' => 'License Detail',
            'license_key' => 'lincense Key',
            'start_date' => 'วันเริ่ม',
            'expire_date' => 'วันหมดอายุ',
            'status' => 'สถานะ',
            'operate_by' => 'หน่วยงานรับผิดชอบ',
            'note' => 'หมายเหตุ',
            'software_id' => 'Software ID',
        ];
    }
}
