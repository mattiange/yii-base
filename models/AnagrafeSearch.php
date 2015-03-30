<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anagrafe;

/**
 * AnagrafeSearch represents the model behind the search form about `app\models\Anagrafe`.
 */
class AnagrafeSearch extends Anagrafe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idContatto', 'com_residenza_id', 'com_nascita_id'], 'integer'],
            [['cognome', 'nome', 'indirizzo', 'data_nascita', 'email', 'cellulare', 'telefono', 'username', 'password', 'creato_il', 'aggiornato_il'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Anagrafe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idContatto' => $this->idContatto,
            'com_residenza_id' => $this->com_residenza_id,
            'data_nascita' => $this->data_nascita,
            'com_nascita_id' => $this->com_nascita_id,
            'creato_il' => $this->creato_il,
            'aggiornato_il' => $this->aggiornato_il,
        ]);

        $query->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'indirizzo', $this->indirizzo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cellulare', $this->cellulare])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
