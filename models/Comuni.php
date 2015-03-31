<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "comuni".
 *
 * @property integer $id
 * @property integer $id_regione
 * @property integer $id_provincia
 * @property string $comune
 */
class Comuni extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'comuni';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_regione', 'id_provincia', 'comune'], 'required'],
            [['id_regione', 'id_provincia'], 'integer'],
            [['comune'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_regione' => 'Id Regione',
            'id_provincia' => 'Id Provincia',
            'comune' => 'Comune',
        ];
    }

    /**
     * Restituisce un array con l'elenco dei comuni per provincia
     * utilizzato dalla actionComuniProvincia() per popolare una DropDep List 
     *                 
     * [
     *      ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
     *      ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
     * ]
     * 
     * @param integer $id
     */
    static function getComuniList($id_provincia) {
        $sql = 'SELECT id, comune FROM comuni where id_provincia ="' . $id_provincia . '"';
        $comuni = Comuni::findBySql($sql)
                ->asArray()
                ->all();

        foreach ($comuni as $comune) {
            $out[] = ['id' => $comune['id'], 'name' => $comune['comune']];
        }
        return $out;
    }

    /**
     * Cerca e restituisce un elenco di comuni in base alla prima parte del nome
     * @param type $search
     * @return type dbresult
     */
    static function ComuniListBySearch($search=null) {
        $query = new Query;
        $query->select('id, comune AS text')
                ->from('comuni')
                ->where('comune LIKE "%' . $search . '%"')
                ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
                
        return $data;
    }

}
