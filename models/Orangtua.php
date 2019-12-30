<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orangtua".
 *
 * @property integer $id
 * @property integer $id_peserta
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $tgl_lahir_ayah
 * @property string $tgl_lahir_ibu
 * @property string $alamat
 * @property string $pkrjn_ayah
 * @property string $pkrjn_ibu
 * @property string $tempat_lahir_ayah
 * @property string $tempat_lahir_ibu
 *
 * @property Peserta $idPeserta
 */
class Orangtua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orangtua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_peserta', 'nama_ayah', 'nama_ibu', 'tgl_lahir_ayah', 'tgl_lahir_ibu', 'alamat', 'tempat_lahir_ayah', 'tempat_lahir_ibu'], 'required'],
            [['id_peserta'], 'integer'],
            [['id_peserta'], 'unique','message' => 'Nama peserta / calon sudah ada'],
            [['tgl_lahir_ayah', 'tgl_lahir_ibu'], 'safe'],
            [['nama_ayah', 'nama_ibu', 'pkrjn_ayah', 'pkrjn_ibu'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 100],
            [['tempat_lahir_ayah', 'tempat_lahir_ibu'], 'string', 'max' => 50],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_peserta' => Yii::t('app', 'Nama Peserta / Calon'),
            'nama_ayah' => Yii::t('app', 'Nama Ayah'),
            'nama_ibu' => Yii::t('app', 'Nama Ibu'),
            'tgl_lahir_ayah' => Yii::t('app', 'Tanggal Lahir'),
            'tgl_lahir_ibu' => Yii::t('app', 'Tanggal Lahir'),
            'alamat' => Yii::t('app', 'Alamat'),
            'pkrjn_ayah' => Yii::t('app', 'Pekerjaan Ayah'),
            'pkrjn_ibu' => Yii::t('app', 'Pekerjaan Ibu'),
            'tempat_lahir_ayah' => Yii::t('app', 'Tempat'),
            'tempat_lahir_ibu' => Yii::t('app', 'Tempat'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    public function getAllCalon()
    {
        $data = Peserta::find()
        ->all();

        return yii\helpers\ArrayHelper::map($data, 'id', 'nama_lengkap');
    }

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $dropdown = Peserta::find()
            ->all();

        }
        return yii\helpers\ArrayHelper::map($dropdown, 'id', 'nama_lengkap') ;
    }
}
