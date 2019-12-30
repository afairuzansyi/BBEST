<?php

namespace app\models;
use app\models\Peserta;
use app\models\NilaiPeserta;

use Yii;

/**
 * This is the model class for table "nilai".
 *
 * @property integer $id
 * @property string $nilai
 * @property string $semester
 * @property string $tahun_ajaran
 * @property integer $status
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai';
    }

    public $nama;
    //public $id_peserta;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pddkn', 'nilai', 'semester', 'tahun_ajaran'], 'required'],
            [['id_pddkn'], 'integer'],
            [['nilai'], 'number'],
            [['semester'], 'string', 'max' => 5],
            [['tahun_ajaran'], 'string', 'max' => 10],
            ['nama','safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pddkn' => Yii::t('app', 'Tingkat Pendidikan'),
            'nilai' => Yii::t('app', 'Nilai'),
            'semester' => Yii::t('app', 'Semester'),
            'tahun_ajaran' => Yii::t('app', 'Tahun Ajaran'),
        ];
    }


    /*
    *
    *
    * GET Peserta()
    *
    *
    */

    public function getAllPeserta()
    {
        $data = Peserta::find()
            ->where(['status' => 1
        ])
        ->all();

        return yii\helpers\ArrayHelper::map($data, 'id', 'nama_lengkap');
    }



    public function getNilaiPeserta()
    {
       return $this->hasOne(NilaiPeserta::className(), ['id_nilai' => 'id']);
    }


 
    public function getPeserta()
    {
       return $this->hasMany(Peserta::className(), ['id' => 'id_peserta'])
       ->viaTable('nilai_peserta', ['id_nilai' => 'id']);
    }



    public function getPesertaIds()
    {
       $this->nama = \yii\helpers\ArrayHelper::getColumn(
         $this->getNilaiPeserta()->asArray()->all(),
         'id_peserta'
       );
       return $this->nama;
    }

    public function getNilais()
    {
        return $this->hasMany(Peserta::className(), ['id' => 'id_peserta'])
            ->viaTable('nilai_peserta', ['id_peserta' => 'id']);
    }

    public function getNama()
    {
        return $this->peserta->nama_lengkap;
    }


    public function getIdPddkn()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pddkn']);
    }

    public function getPendidikan()
    {
        $data = Pendidikan::find()
            ->all();

        return yii\helpers\ArrayHelper::map($data, 'id', 'pendidikan');
    }

    public static function tajaran()
    {
        // get all records from database and generate
        static $tajaran;
        if ($tajaran === null) {
            $tajaran = static::find()
            ->all();

        }
        return yii\helpers\ArrayHelper::map($tajaran,'tahun_ajaran','tahun_ajaran');

    }
}
