<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblCheckName".
 *
 * @property int $id
 * @property int $typechk_id
 * @property string $check_name
 */
class TblCheckName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblCheckName';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typechk_id'], 'integer'],
            [['check_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typechk_id' => 'Typechk ID',
            'check_name' => 'Check Name',
        ];
    }
    
    
    public function getTypecheck(){
        return $this->hasOne(TblTypeCheck::className(),['typechk_id'=> 'typechk_id']);
    }
}
