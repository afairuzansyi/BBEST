<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekening".
 *
 * @property integer $id
 * @property integer $id_peserta
 * @property string $nama_bank
 * @property string $no_rekening
 *
 * @property Peserta $idPeserta
 */
class Rekening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rekening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_peserta', 'nama_bank', 'no_rekening'], 'required'],
            [['id_peserta'], 'integer'],
            [['nama_bank'], 'string', 'max' => 25],
            [['no_rekening'], 'string', 'max' => 30],
            [['id_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_peserta' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_peserta' => Yii::t('app', 'Nama Peserta'),
            'nama_bank' => Yii::t('app', 'Nama Bank'),
            'no_rekening' => Yii::t('app', 'No Rekening'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    public function getAllPeserta()
    {
        $data = Peserta::find()
            ->where(['status' => 1
        ])
        ->all();

        return yii\helpers\ArrayHelper::map($data, 'id', 'nama_lengkap');
    }

    public function getRek($id_peserta) 
    {
        $data = Rekening::find()
            ->where(['id_peserta' => $id_peserta])
            ->select(['id','no_rekening AS name'])
            ->asArray()
            ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }

    
}
