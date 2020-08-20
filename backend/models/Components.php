<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblRTAFComponents".
 *
 * @property string $code
 * @property string $nameComponents
 */
class Components extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblRTAFComponents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['code', 'nameComponents'], 'required'],
            [['code'], 'string', 'max' => 5],
            [['nameComponents'], 'string', 'max' => 200],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'nameComponents' => 'Name Components',
        ];
    }
}
