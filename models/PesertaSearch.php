<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peserta;
use app\models\Pendidikan;


/**
 * PesertaSearch represents the model behind the search form about `app\models\Peserta`.
 */
class PesertaSearch extends Peserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'tingkat_pddkn'], 'integer'],
            [['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'tinggal_pada', 'no_hp', 'nama_sekolah', 'hoby', 'cita_cita','tingkatPddkn.pendidikan'], 'safe'],
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
     * @inheritdoc
     */
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['tingkatPddkn.pendidikan']);
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
        
        $pendidikan = new Pendidikan;
        $peserta = new Peserta;
        $pendidikanTable = $pendidikan::tableName();
        $pesertaTable = $peserta::tableName();
        

        $query = $peserta::find();
        $query->joinWith(['tingkatPddkn' => function ($query) use ($pendidikanTable) {
            $query->from(['tingkatPddkn' => $pendidikanTable]);
        }]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $addSortAttributes = ["tingkatPddkn.pendidikan"];
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
            'status' => $this->status,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tingkat_pddkn' => $this->tingkat_pddkn,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tinggal_pada', $this->tinggal_pada])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'hoby', $this->hoby])
            ->andFilterWhere(['like', 'cita_cita', $this->cita_cita])
            ->andFilterWhere(['like', "tingkatPddkn.pendidikan", $this->getAttribute('tingkatPddkn.pendidikan')]);

        return $dataProvider;
    }
}
