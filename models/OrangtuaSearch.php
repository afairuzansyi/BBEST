<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orangtua;
use app\models\Peserta;

/**
 * OrangtuaSearch represents the model behind the search form about `app\models\Orangtua`.
 */
class OrangtuaSearch extends Orangtua
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_peserta'], 'integer'],
            [['nama_ayah', 'nama_ibu', 'tgl_lahir_ayah', 'tgl_lahir_ibu', 'alamat', 'pkrjn_ayah', 'pkrjn_ibu', 'tempat_lahir_ayah', 'tempat_lahir_ibu','idPeserta.nama_lengkap'], 'safe'],
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


    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idPeserta.nama_lengkap']);
    }


    public function search($params)
    {
       
        $peserta = new Peserta;
        $orangtua = new Orangtua;

        $orangtuaTable = $orangtua::tableName();
        $pesertaTable = $peserta::tableName();
        

        $query = $orangtua::find();
        $query->joinWith(['idPeserta' => function ($query) use ($pesertaTable) {
            $query->from(['idPeserta' => $pesertaTable]);

         }]);
        //$query = Orangtua::find();

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
            'tgl_lahir_ayah' => $this->tgl_lahir_ayah,
            'tgl_lahir_ibu' => $this->tgl_lahir_ibu,
        ]);

        $query->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pkrjn_ayah', $this->pkrjn_ayah])
            ->andFilterWhere(['like', 'pkrjn_ibu', $this->pkrjn_ibu])
            ->andFilterWhere(['like', 'tempat_lahir_ayah', $this->tempat_lahir_ayah])
            ->andFilterWhere(['like', 'tempat_lahir_ibu', $this->tempat_lahir_ibu])
            ->andFilterWhere(['like', "idPeserta.nama_lengkap", $this->getAttribute('idPeserta.nama_lengkap')]);

        return $dataProvider;
    }
}
