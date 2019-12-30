<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $id
 * @property string $pendidikan
 *
 * @property Beasiswa[] $beasiswas
 * @property Profile[] $profiles
 * @property RiwayatPddkn[] $riwayatPddkns
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pendidikan'], 'required'],
            [['pendidikan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pendidikan' => Yii::t('app', 'Pendidikan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeasiswas()
    {
        return $this->hasMany(Beasiswa::className(), ['id_pddkn' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertas()
    {
        return $this->hasMany(Peserta::className(), ['tingkat_pddkn' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->pendidikan;
            }
        }
        return $dropdown;
    }

    public function getPend($id_peserta) 
    {
        $data = Pendidikan::find()
            ->where(['id' => Peserta::find()
                ->select('tingkat_pddkn')
                ->where(['id' => $id_peserta])
        ])     
            ->select(['id','pendidikan AS name'])       
            ->asArray()
            ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }

}
