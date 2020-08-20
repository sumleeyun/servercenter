<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblTypeCheck".
 *
 * @property int $typechk_id
 * @property string $typechk_name
 */
class TblTypeCheck extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblTypeCheck';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typechk_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'typechk_id' => 'Typechk ID',
            'typechk_name' => 'Typechk Name',
        ];
    }
}
