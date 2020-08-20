<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblRTAFComponents".
 *
 * @property string $codeComponents
 * @property string $nameComponents
 */
class TblRTAFComponents extends \yii\db\ActiveRecord
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
            [['codeComponents', 'nameComponents'], 'required'],
            [['codeComponents'], 'string', 'max' => 5],
            [['nameComponents'], 'string', 'max' => 200],
            [['codeComponents'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codeComponents' => 'Code Components',
            'nameComponents' => 'Name Components',
        ];
    }
}
