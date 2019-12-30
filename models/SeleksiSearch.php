<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seleksi;
use app\models\Peserta;

/**
 * SeleksiSearch represents the model behind the search form about `app\models\Seleksi`.
 */
class SeleksiSearch extends Seleksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_calon', 'hasil1', 'hasil2', 'hasil3', 'hasil4', 'hasil'], 'integer'],
            [['peserta.nama_lengkap'], 'safe']
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
        return array_merge(parent::attributes(), ['peserta.nama_lengkap']);
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
        $peserta = new Peserta;
        $seleksi = new Seleksi;
        $pesertaTable = $peserta::tableName();
        $seleksiTable = $seleksi::tableName();

        $query = $seleksi::find();
        $query->joinWith(['peserta' =>function ($query) use ($pesertaTable) {
            $query->from(['peserta' => $pesertaTable]);
        }]);
        //$query = Seleksi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $addSortAttributes = ["peserta.nama_lengkap"];
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
            'id_calon' => $this->id_calon,
            'hasil1' => $this->hasil1,
            'hasil2' => $this->hasil2,
            'hasil3' => $this->hasil3,
            'hasil4' => $this->hasil4,
            'hasil' => $this->hasil,
        ]);

        $query->andFilterWhere(['like', "peserta.nama_lengkap", $this->getAttribute('peserta.nama_lengkap')]);

        return $dataProvider;
    }
}
