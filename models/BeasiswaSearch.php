<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beasiswa;
use app\models\Pendidikan;

/**
 * BeasiswaSearch represents the model behind the search form about `app\models\Beasiswa`.
 */
class BeasiswaSearch extends Beasiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','id_pddkn'], 'integer'],
            [['idPddkn.pendidikan'],'safe'],
            [['jumlah_bea'], 'number'],
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
        return array_merge(parent::attributes(), ['idPddkn.pendidikan']);
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
        $beasiswa = new Beasiswa;
        $pendidikan = new Pendidikan;

        $beasiswaTable = $beasiswa::tableName();
        $pendidikanTable = $pendidikan::tableName();
        

        $query = $beasiswa::find();
        $query->joinWith(['idPddkn' => function ($query) use ($pendidikanTable) {
            $query->from(['idPddkn' => $pendidikanTable]);

         }]);

        //$query = Beasiswa::find()->joinWith('idPddkn');

        // add conditions that should always apply here

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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jumlah_bea' => $this->jumlah_bea,
        ]);

        $query->andFilterWhere(['like', "idPddkn.pendidikan", $this->getAttribute('idPddkn.pendidikan')]);

        return $dataProvider;
    }
}
