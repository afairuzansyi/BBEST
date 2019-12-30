<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nilai;
use app\models\NilaiPeserta;
use app\models\Peserta;
use app\models\Pendidikan;

/**
 * NilaSearch represents the model behind the search form about `app\models\Nilai`.
 */
class NilaiSearch extends Nilai
{
    /**
     * @inheritdoc
     */

  
    public function rules()
    {
        return [
            [['id', 'id_pddkn'], 'integer'],
            [['nilai'], 'number'],
            [['semester', 'tahun_ajaran','idPddkn.pendidikan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idPddkn.pendidikan']);
      /*  return array_merge(parent::attributes(), ['nilaiPeserta.id_nilai']);
        return array_merge(parent::attributes(), ['peserta.id_peserta']);*/
    }

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
        $peserta    = new Peserta;
        $nilaipsrt  = new NilaiPeserta;
        $nilai      = new Nilai;
        $pendidikan = new Pendidikan;
//        $query = Nilai::find();
        $pesertaTable   = $peserta::tableName();
        $nilaipsrtTable = $nilaipsrt::tableName();
        $nilaiTable     = $nilai::tableName();
        $pendidikanTable= $pendidikan::tableName();

        // add conditions that should always apply here
        $query = $nilai::find();
        $query->joinWith(['idPddkn' => function ($query) use ($pendidikanTable){
            $query->from(['idPddkn' => $pendidikanTable]);
            }]);
      /*  $query->joinWith(['peserta' => function ($query) use ($nilaipsrtTable){
            $query->from(['peserta' => $nilaipsrtTable]);
            }]);
        $query->joinWith(['peserta' => function ($query) use ($pesertaTable){
            $query->from(['peserta' => $pesertaTable]);
            }]);*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $addSortAttributes = ["idPddkn.pendidikan"];
        foreach ($addSortAttributes as $addSortAttribute) {
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
            ];
        }

        /*$addSortAttributes = ["peserta.id_peserta"];
        foreach ($addSortAttributes as $addSortAttribute) {
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
            ];
        }

         $addSortAttributes = ["nilaiPeserta.id_nilai"];
        foreach ($addSortAttributes as $addSortAttribute) {
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
            ];
        }*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nilai' => $this->nilai,
        ]);

        $query->andFilterWhere(['like', 'semester', $this->semester])
              ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran])
              ->andFilterWhere(['like', "idPddkn.pendidikan", $this->getAttribute('idPddkn.pendidikan')])
              /*->andFilterWhere(['like', "peserta.id_peserta", $this->getAttribute('peserta.id_peserta')])*/;

        return $dataProvider;
    }
}
