<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_subtype".
 *
 * @property int $subtype_id
 * @property string $subtype_name
 * @property int $type_id
 * @property string $subtype_notes
 * @property int $active
 */
class support_service_subtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_subtype';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbsupport');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subtype_name', 'type_id', 'subtype_notes'], 'required'],
            [['type_id', 'active'], 'integer'],
            [['subtype_name'], 'string', 'max' => 200],
            [['subtype_notes'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subtype_id' => 'Subtype ID',
            'subtype_name' => 'Subtype Name',
            'type_id' => 'Type ID',
            'subtype_notes' => 'Subtype Notes',
            'active' => 'Active',
        ];
    }
    
    public function getType() {
        return $this->hasOne(support_service_type::className(), ['type_id' => 'type_id']);
    }
    
    public  function getListType(){
        return support_service_type::find()->select(['type_name', 'type_id'])->indexBy('type_id')->column();
    }
}
