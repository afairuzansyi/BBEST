<?php

namespace app\modules\user\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `app\models\Profile`.
 */
class PesertaSearch extends Profile
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return "{{%profile}}";
    }

    public function rules()
    {
        return [
            [['id', 'user_id', 'anak_ke', 'tingkt_pddkn', 'tahun_masuk'], 'integer'],
            [['created_at', 'updated_at', 'full_name', 'timezone', 'no_identitas', 'tgl_lahir', 'agama', 'alamat', 'foto', 'jurusan', 'nama_sekolah', 'no_hp', 'jenis_kalamin'], 'safe'],
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
        return array_merge(parent::attributes(), ['user.status']);
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
        // get models
        $user = $this->module->model("User");
        $profile = $this->module->model("Profile");
        $userTable = $user::tableName();
        $profileTable = $profile::tableName();

        $query = $profile::find();
        $query->joinWith(['user' => function ($query) use ($userTable) {
            $query->from(['user' => $userTable])
                  ->where('role_id > 1');
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
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'anak_ke' => $this->anak_ke,
            'tgl_lahir' => $this->tgl_lahir,
            'tingkt_pddkn' => $this->tingkt_pddkn,
            'tahun_masuk' => $this->tahun_masuk,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'timezone', $this->timezone])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'jurusan', $this->jurusan])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'jenis_kalamin', $this->jenis_kalamin]);

        return $dataProvider;
    }
}
