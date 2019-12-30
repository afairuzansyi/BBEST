<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rekening;
use app\models\Peserta;
/**
 * RekeningSearch represents the model behind the search form about `app\models\Rekening`.
 */
class RekeningSearch extends Rekening
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_peserta'], 'integer'],
            [['nama_bank', 'no_rekening','idPeserta.nama_lengkap'], 'safe'],
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

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idPeserta.nama_lengkap']);
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
        $rekening = new Rekening;
        $peserta = new Peserta;
        $rekeningTable = $rekening::tableName();
        $pesertaTable = $peserta::tableName();


        $query = $rekening::find();
        $query->joinWith(['idPeserta' => function ($query) use ($pesertaTable) {
            $query->from(['idPeserta' => $pesertaTable]);
        }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $addSortAttributes = ["idPeserta.nama_lengkap"];
        foreach ($addSortAttributes as $addSortAttribute) {
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
            ];
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_peserta' => $this->id_peserta,
        ]);

        $query->andFilterWhere(['like', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['like', 'no_rekening', $this->no_rekening])
            ->andFilterWhere(['like', "idPeserta.nama_lengkap", $this->getAttribute('idPeserta.nama_lengkap')]);

        return $dataProvider;
    }


}
