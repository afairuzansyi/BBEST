<?php

namespace app\models\blog;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\blog\Post;

/**
 * PostSearch represents the model behind the search form about `app\models\blog\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public $kategori;
    public function rules()
    {
        return [
            [['id', 'kategori_id', 'status', 'create_time', 'update_time', 'user_id'], 'integer'],
            [['konten','kategori'], 'safe'],
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
        $query = Post::find();

        // add conditions that should always apply here
        $query->joinWith('kategori');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['kategori'] = [
            'asc' => ['kategori.nama' => SORT_ASC ],
            'desc' => ['kategori.nama' => SORT_DESC],
        ];

        

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'user_id' => $this->user_id,
        ])
            ->andFilterWhere(['like', 'kategori.nama', $this->kategori]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'konten', $this->konten]);

        return $dataProvider;
    }
}
