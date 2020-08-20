<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $url_id
 * @property string $url_name
 * @property string $url_notes
 * @property int $active
 */
class support_Url extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
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
            [['url_name'], 'required'],
            [['active'], 'integer'],
            [['url_name'], 'string', 'max' => 200],
            [['url_notes'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'url_id' => 'Url ID',
            'url_name' => 'Url Name',
            'url_notes' => 'Url Notes',
            'active' => 'Active',
        ];
    }
}
