<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblMenu".
 *
 * @property int $idMenu
 * @property string $nameMenu
 * @property string $urlMenu
 * @property string $noteMenu
 */
class TblMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblMenu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameMenu', 'urlMenu', 'noteMenu'], 'required'],
            [['noteMenu'], 'string'],
            [['nameMenu', 'urlMenu'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMenu' => 'Id Menu',
            'nameMenu' => 'Name Menu',
            'urlMenu' => 'Url Menu',
            'noteMenu' => 'Note Menu',
        ];
    }
}
