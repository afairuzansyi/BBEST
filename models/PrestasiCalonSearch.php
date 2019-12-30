<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PrestasiCalon;
use app\models\Peserta;

/**
 * PrestasiCalonSearch represents the model behind the search form about `app\models\PrestasiCalon`.
 */
class PrestasiCalonSearch extends PrestasiCalon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_calon', 'juara'], 'integer'],
            [['nama_kejuaraan', 'tingkat','idCalon.nama_lengkap'], 'safe'],
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
        return array_merge(parent::attributes(), ['idCalon.nama_lengkap']);
    }



    public function search($params)
    {
        $prestasi = new PrestasiCalon;
        $peserta   = new Peserta;
        $prestasiTable = $prestasi::tableName();
        $pesertaTable = $peserta::tableName();

        $query = $prestasi::find();
        $query->joinWith(['idCalon' => function ($query) use ($pesertaTable) {
            $query->from(['idCalon' => $pesertaTable]);
        }]);

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
            'id' => $this->id,
            'id_calon' => $this->id_calon,
            'juara' => $this->juara,
        ]);

        $query->andFilterWhere(['like', 'nama_kejuaraan', $this->nama_kejuaraan])
            ->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', "idCalon.nama_lengkap", $this->getAttribute('idCalon.nama_lengkap')]);

        return $dataProvider;
    }
}
