<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "anagrafe".
 *
 * @property integer $idContatto
 * @property string $cognome
 * @property string $nome
 * @property string $indirizzo
 * @property integer $com_residenza_id
 * @property string $data_nascita
 * @property integer $com_nascita_id
 * @property string $email
 * @property string $cellulare
 * @property string $telefono
 * @property string $username
 * @property string $password
 * @property string $creato_il
 * @property string $aggiornato_il
 */
class Anagrafe extends \yii\db\ActiveRecord {
    
    //Utilizzata nel DropDown List a cascata (Province, comuni) nel _form.php
    public $provincia="";
    
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'anagrafe';
    }

    /**
     * @inheritdoc
     * Aggiornamento automatico dei campi creato_il e agiornato_il 
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'creato_il',
                'updatedAtAttribute' => 'aggiornato_il',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['com_residenza_id', 'com_nascita_id'], 'required'],
            [['com_residenza_id', 'com_nascita_id'], 'integer'],
            [['data_nascita', 'creato_il', 'aggiornato_il'], 'safe'],
            [['cognome', 'nome', 'indirizzo', 'username', 'password'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['cellulare', 'telefono'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'idContatto' => 'Id Contatto',
            'cognome' => 'Cognome',
            'nome' => 'Nome',
            'indirizzo' => 'Indirizzo',
            'com_residenza_id' => 'Com Residenza ID',
            'data_nascita' => 'Data Nascita',
            'com_nascita_id' => 'Com Nascita ID',
            'email' => 'Email',
            'cellulare' => 'Cellulare',
            'telefono' => 'Telefono',
            'username' => 'Username',
            'password' => 'Password',
            'creato_il' => 'Creato Il',
            'aggiornato_il' => 'Aggiornato Il',
        ];
    }

}
