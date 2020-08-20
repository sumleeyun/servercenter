<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $company_nameE ชื่อบริษัทอังกฤษ
 * @property string $company_nameT ชื่อบริษัทภาษาไทย
 * @property string $company_tel เบอร์ติดต่อ
 * @property string $company_email Email
 * @property string $company_note หมายเหตุ
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_nameT'], 'required'],
            [['company_note'], 'string'],
            [['company_nameE', 'company_nameT', 'company_tel', 'company_email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_nameE' => 'ชื่อบริษัทอังกฤษ',
            'company_nameT' => 'ชื่อบริษัทภาษาไทย',
            'company_tel' => 'เบอร์ติดต่อ',
            'company_email' => 'Email',
            'company_note' => 'หมายเหตุ',
        ];
    }
}
