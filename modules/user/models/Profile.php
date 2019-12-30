<?php

namespace app\modules\user\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Orangtua;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $full_name
 * @property string $timezone
 *
 * @property User $user
 */
class Profile extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name'], 'string', 'max' => 255],
            [['timezone'], 'string', 'max' => 255],
            [['no_identitas','anak_ke','tgl_lahir','alamat','tahun_masuk','jurusan','nama_sekolah','no_hp','tingkt_pddkn', 'agama','full_name'],'required','message'=>'Kolom Harus Diisi'],
            ['full_name', 'unique'],
            ['tingkt_pddkn','integer'],
        ];
    }

    /**
     * @var \app\modules\user\Module
     */
    public $module;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->module) {
            $this->module = Yii::$app->getModule("user");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'user_id' => Yii::t('user', 'User ID'),
            'created_at' => Yii::t('user', 'Created At'),
            'updated_at' => Yii::t('user', 'Updated At'),
            'full_name' => Yii::t('user', 'Full Name'),
            'timezone' => Yii::t('user', 'Time zone'),
            'no_identitas' => Yii::t('user','NO IDENTITAS'),
            'anak_ke' => Yii::t('user','Anak Ke'),
            'tgl_lahir' => Yii::t('user','Tanggal Lahir'),
            'agama' => Yii::t('user','Agama'),
            'alamat' => Yii::t('user','Alamat'),
            'foto' => Yii::t('user','Foto'),
            'jurusan' => Yii::t('user','Jurusan'),
            'nama_sekolah' => Yii::t('user','Nama Sekolah'),
            'no_hp' => Yii::t('user','No Handphone'),
            'tingkt_pddkn' => Yii::t('user', 'Tingkat Pendidikan'),
            'tahun_masuk' => Yii::t('user', 'Tahun Masuk'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => function ($event) {
                    return gmdate("Y-m-d H:i:s");
                },
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        $user = $this->module->model("User");
        return $this->hasOne($user::className(), ['id' => 'user_id']);
    }

    /**
     * Set user id
     * @param int $userId
     * @return static
     */
    public function setUser($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    public function getRPendidikan()
    {
        return $this->hasMany(app\models\RiwayatPendidikanPeserta::className(), ['id' => 'profile_id']);
    }


     /**
    *
    * GET AllProfile()
    *
    *
    */

     /**
    *
    * GET Nama()
    *
    *
    */

    public function getNama()
    {
        $model = Profile::find()
        ->where(['not in', 'id',(Orangtua::find()
                ->select('id_profile'))
        ])
        ->andWhere(['in', 'user_id',(User::find()
                ->select('id')
                ->where(['role_id' => 2, 'role_id' => 3]))
        ])
        ->all();
        return ArrayHelper::map($model,'id','full_name');
    }

    /**
    *
    * GET Nilai()
    *
    *
    */
    public function getNilais()
    {
        return $this->hasMany(app\models\Nilai::className(), ['id' => 'id_nilai'])
            ->viaTable('nilai_peserta', ['id_peserta' => 'id']);
    }

}