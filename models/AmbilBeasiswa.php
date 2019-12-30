<?php

namespace app\models;

use Yii;
use app\models\Rekening;

/**
 * This is the model class for table "ambil_beasiswa".
 *
 * @property string $code_trans
 * @property string $tgl
 * @property integer $id_peserta
 * @property integer $id_pddkn
 * @property integer $no_rekening
 * @property integer $beasiswa
 * @property string $tgl_ambil
 * @property integer $status
 *
 * @property Peserta $idPeserta
 */
class AmbilBeasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ambil_beasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_trans', 'id_peserta', 'beasiswa', 'status'], 'required'],
            [['tgl', 'tgl_ambil'], 'safe'],
            [['id_peserta', 'id_pddkn', 'no_rekening', 'beasiswa', 'status'], 'integer'],
            [['code_trans'], 'string', 'max' => 12],
            [['id_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_peserta' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code_trans' => Yii::t('app', 'Kode Ambil'),
            'tgl' => Yii::t('app', 'Periode'),
            'id_peserta' => Yii::t('app', 'Nama Peserta'),
            'id_pddkn' => Yii::t('app', 'Pendidikan'),
            'no_rekening' => Yii::t('app', 'No Rekening'),
            'beasiswa' => Yii::t('app', 'Beasiswa'),
            'tgl_ambil' => Yii::t('app', 'Tanggal Ambil'),
            'status' => Yii::t('app', 'Status Pengambilan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
/*    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }*/

    public function getAllPeserta()
    {
        $data = Peserta::find()
            ->where(['status' => 1
        ])
        ->all();
        $value=(count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'id','nama_lengkap');

        return $value;
    }

    /*public function getPendidikan($peserta_id)
    {
        $data = app\models\Pendidikan::find()
            ->select('id')
            ->where(['id' => (Peserta::find()
                ->select('id_pddkn')
                ->where(['id' => $peserta_id])
            )])
            ->all();

            return yii\helpers\ArrayHelper::map($data, 'id', 'pendidikan');
    }*/

    /*public function getPend($nama_lengkap) 
    {
        $data = Pendidikan::find()
            ->where(['id', '=',(Peserta::find()
                ->select('tingkat_pddkn')
                ->where(['id' => $nama_lengkap])
                )])
            ->select(['id','pendidikan'])
            ->asArray()
            ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }

    public function getRek($id_peserta) 
    {
        $data = Rekening::find()
            ->where(['id_peserta' => $id_peserta])
            ->select(['id','no_rekening'])
            ->asArray()
            ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }*/

    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPddkn()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pddkn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeasiswa0()
    {
        return $this->hasOne(Beasiswa::className(), ['id' => 'beasiswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoRekening()
    {
        return $this->hasOne(Rekening::className(), ['id' => 'no_rekening']);
    
    }
    public static function periode()
    {
        // get all records from database and generate
        static $periode;
        if ($periode === null) {
            $periode = static::find()
            ->select('tgl')
            ->where(['status' => 1])
            ->all();

        }
        return yii\helpers\ArrayHelper::map($periode,'tgl','tgl');

    }



}
