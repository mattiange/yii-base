<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property integer $id_regione
 * @property string $provincia
 * @property string $sigla
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_regione', 'provincia', 'sigla'], 'required'],
            [['id', 'id_regione'], 'integer'],
            [['provincia'], 'string'],
            [['sigla'], 'string', 'max' => 2]
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
            'provincia' => 'Provincia',
            'sigla' => 'Sigla',
        ];
    }
}
