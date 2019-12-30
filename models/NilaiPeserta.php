<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai_peserta".
 *
 * @property integer $id_nilai
 * @property integer $id_peserta
 */
class NilaiPeserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nilai', 'id_peserta'], 'required'],
            [['id_nilai', 'id_peserta'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nilai' => Yii::t('app', 'Id Nilai'),
            'id_peserta' => Yii::t('app', 'Id Peserta'),
        ];
    }

    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    public static function get_nilai_name_by_id($id)
    {
        $model = Peserta::find()->where(["id" => $id])->one();
            if(!empty($model)){
        return $model->nama_lengkap;
    }
        return null;
    }

    public static function dropdown()
    {
        // get all records from database and generate
        static $dropdown;
        if ($dropdown === null) {
            $models = Peserta::find()
                ->where(['id' => (static::find()
                    ->select('id_peserta'))])
                ->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->nama_lengkap;
            }
        }
        return $dropdown;
    }
}
