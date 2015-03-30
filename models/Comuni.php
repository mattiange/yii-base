<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comuni".
 *
 * @property integer $id
 * @property integer $id_regione
 * @property integer $id_provincia
 * @property string $comune
 */
class Comuni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comuni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_regione', 'id_provincia', 'comune'], 'required'],
            [['id_regione', 'id_provincia'], 'integer'],
            [['comune'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_regione' => 'Id Regione',
            'id_provincia' => 'Id Provincia',
            'comune' => 'Comune',
        ];
    }
}
