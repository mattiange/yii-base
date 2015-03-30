<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regioni".
 *
 * @property integer $id
 * @property string $regione
 */
class Regioni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regioni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'regione'], 'required'],
            [['id'], 'integer'],
            [['regione'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regione' => 'Regione',
        ];
    }
}
