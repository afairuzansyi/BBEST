<?php

namespace app\models;

use Yii;
use yii\helpers\Inflector;
use ReflectionClass;

/**
 * This is the model class for table "peserta".
 *
 * @property integer $id
 * @property integer $status
 * @property string $nama_lengkap
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $tinggal_pada
 * @property string $no_hp
 * @property integer $tingkat_pddkn
 * @property string $nama_sekolah
 * @property string $hoby
 * @property string $cita_cita
 *
 * @property NilaiCalon[] $nilaiCalons
 * @property Orangtua[] $orangtuas
 * @property Pendidikan $tingkatPddkn
 * @property Rekening[] $rekenings
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     const STATUS_CALON = 0;
    /**
     * @var int Active status
     */
    const STATUS_PESERTA = 1;

    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'tingkat_pddkn'], 'integer'],
            [['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'tinggal_pada', 'no_hp', 'tingkat_pddkn', 'nama_sekolah', 'hoby', 'cita_cita'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin'], 'string'],
            [['nama_lengkap', 'tinggal_pada', 'nama_sekolah'], 'string', 'max' => 50],
            [['tempat_lahir', 'hoby', 'cita_cita'], 'string', 'max' => 25],
            [['no_hp'], 'string', 'max' => 12],
            [['tingkat_pddkn'], 'exist', 'skipOnError' => true, 'targetClass' => Pendidikan::className(), 'targetAttribute' => ['tingkat_pddkn' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'tinggal_pada' => Yii::t('app', 'Tinggal Pada'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'tingkat_pddkn' => Yii::t('app', 'Tingkat Pendidikan'),
            'nama_sekolah' => Yii::t('app', 'Nama Sekolah'),
            'hoby' => Yii::t('app', 'Hoby'),
            'cita_cita' => Yii::t('app', 'Cita Cita'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiCalons()
    {
        return $this->hasMany(NilaiCalon::className(), ['id_calon' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrangtuas()
    {
        return $this->hasMany(Orangtua::className(), ['id_peserta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatPddkn()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'tingkat_pddkn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekenings()
    {
        return $this->hasMany(Rekening::className(), ['id_peserta' => 'id']);
    }

    public function getPendidikan()
    {
        $data = Pendidikan::find()
            ->all();

        return yii\helpers\ArrayHelper::map($data, 'id', 'pendidikan');
    }

    public function getStatus()
    {
        
        $s = '';
        if($this->status==0){
            $s = 'Calon Peserta';
        }else{
            $s = 'Peserta';
        }

        return $s;
    }


    public static function statusDropdown()
    {
        // get data if needed
        static $dropdown;
        $constPrefix = "STATUS_";
        if ($dropdown === null) {
            // create a reflection class to get constants
            $reflClass = new ReflectionClass(get_called_class());
            $constants = $reflClass->getConstants();
            // check for status constants (e.g., STATUS_ACTIVE)
            foreach ($constants as $constantName => $constantValue) {
                // add prettified name to dropdown
                if (strpos($constantName, $constPrefix) === 0) {
                    $prettyName = str_replace($constPrefix, "", $constantName);
                    $prettyName = Inflector::humanize(strtolower($prettyName));
                    $dropdown[$constantValue] = $prettyName;
                }
            }
        }
        return $dropdown;
    }

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->nama_lengkap;
            }
        }
        return $dropdown;
    }

    public static function dropdown2()
    {
        // get all records from database and generate
        static $dropdown2;
        if ($dropdown2 === null) {
            $models = static::find()
                ->where(['status' => 0])
                ->all();
            foreach ($models as $model) {
                $dropdown2[$model->id] = $model->nama_lengkap;
            }
        }
        return $dropdown2;
    }
}
