<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comuni;

/**
 * ComuniSearch represents the model behind the search form about `app\models\Comuni`.
 */
class ComuniSearch extends Comuni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_regione', 'id_provincia'], 'integer'],
            [['comune'], 'safe'],
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
        $query = Comuni::find();

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
            'id' => $this->id,
            'id_regione' => $this->id_regione,
            'id_provincia' => $this->id_provincia,
        ]);

        $query->andFilterWhere(['like', 'comune', $this->comune]);

        return $dataProvider;
    }
}
