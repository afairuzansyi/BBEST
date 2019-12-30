<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AmbilBeasiswa;

/**
 * AmbilBeasiswaSearch represents the model behind the search form about `app\models\AmbilBeasiswa`.
 */
class AmbilBeasiswaSearch extends AmbilBeasiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_trans', 'tgl', 'tgl_ambil'], 'safe'],
            [['id_peserta', 'id_pddkn', 'no_rekening', 'beasiswa', 'status'], 'integer'],
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
        $query = AmbilBeasiswa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tgl' => $this->tgl,
            'id_peserta' => $this->id_peserta,
            'id_pddkn' => $this->id_pddkn,
            'no_rekening' => $this->no_rekening,
            'beasiswa' => $this->beasiswa,
            'tgl_ambil' => $this->tgl_ambil,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'code_trans', $this->code_trans]);

        return $dataProvider;
    }
}
