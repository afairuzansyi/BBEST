<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestasi_calon".
 *
 * @property integer $id
 * @property integer $id_calon
 * @property string $nama_kejuaraan
 * @property string $tingkat
 * @property integer $juara
 */
class PrestasiCalon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestasi_calon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_calon', 'nama_kejuaraan', 'tingkat', 'juara'], 'required'],
            [['id_calon', 'juara'], 'integer'],
            [['nama_kejuaraan'], 'string', 'max' => 50],
            [['tingkat'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_calon' => Yii::t('app', 'Nama Calon Peserta'),
            'nama_kejuaraan' => Yii::t('app', 'Nama Kejuaraan'),
            'tingkat' => Yii::t('app', 'Tingkat'),
            'juara' => Yii::t('app', 'Juara'),
        ];
    }

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $dropdown = Peserta::find()
                ->where(['status' => 0])
            ->all();

        }
        return yii\helpers\ArrayHelper::map($dropdown, 'id', 'nama_lengkap') ;
    }

    public function getIdCalon()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_calon']);
    }
}
