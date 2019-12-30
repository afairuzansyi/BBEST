<?php

namespace app\models;

use Yii;
use app\modules\user\models\User;
use app\modules\user\models\Profile;

/**
 * This is the model class for table "seleksi".
 *
 * @property integer $id
 * @property integer $id_calon
 * @property integer $hasil1
 * @property integer $hasil2
 * @property integer $hasil3
 * @property integer $hasil4
 * @property integer $hasil
 *
 * @property User $user
 */
class Seleksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seleksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_calon', 'hasil1', 'hasil2', 'hasil3', 'hasil4', 'hasil'], 'required'],
            [['id_calon', 'hasil1', 'hasil2', 'hasil3', 'hasil4', 'hasil'], 'integer'],
            [['id_calon'], 'unique'],
            [['id_calon'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_calon' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_calon' => Yii::t('app', 'Peserta'),
            'hasil1' => Yii::t('app', 'Hasil1'),
            'hasil2' => Yii::t('app', 'Hasil2'),
            'hasil3' => Yii::t('app', 'Hasil3'),
            'hasil4' => Yii::t('app', 'Hasil4'),
            'hasil' => Yii::t('app', 'Hasil'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_calon']);
    }

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $dropdown = Peserta::find()
                ->where(['status' => 1])
            ->all();

        }
        return yii\helpers\ArrayHelper::map($dropdown, 'id', 'nama_lengkap') ;
    }


    public function getLabel1()
    {
        
        $h = '';
        if($this->hasil1==0){
            $h = 'Proses';
        }elseif($this->hasil1==1){
            $h = 'Gagal';
        }else{
            $h = 'Lulus';
        }

        return $h;
    }

    public function getLabel2()
    {
        
        $h = '';
        if($this->hasil2==0){
            $h = 'Proses';
        }elseif($this->hasil2==1){
            $h = 'Gagal';
        }else{
            $h = 'Lulus';
        }

        return $h;
    }

    public function getLabel3()
    {
        
        $h = '';
        if($this->hasil3==0){
            $h = 'Proses';
        }elseif($this->hasil3==1){
            $h = 'Gagal';
        }else{
            $h = 'Lulus';
        }

        return $h;
    }

    public function getLabel4()
    {
        
        $h = '';
        if($this->hasil4==0){
            $h = 'Proses';
        }elseif($this->hasil4==1){
            $h = 'Gagal';
        }else{
            $h = 'Lulus';
        }

        return $h;
    }

    public function getLabel()
    {
        
        $h = '';
        if($this->hasil==0){
            $h = 'Proses';
        }elseif($this->hasil==1){
            $h = 'Gagal';
        }else{
            $h = 'Lulus';
        }

        return $h;
    }
}
