<?php

namespace app\models;

use Yii;
use app\models\Pendidikan;

/**
 * This is the model class for table "beasiswa".
 *
 * @property integer $id
 * @property integer $id_pddkn
 * @property string $jumlah_bea
 *
 * @property Pendidikan $idPddkn
 */
class Beasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pddkn', 'jumlah_bea'], 'required'],
            [['id_pddkn'], 'integer'],
            ['id_pddkn','unique','message'=>'Tingkat pendidikan sudah ada!!'],
            [['jumlah_bea'], 'number'],
            [['id_pddkn'], 'exist', 'skipOnError' => true, 'targetClass' => Pendidikan::className(), 'targetAttribute' => ['id_pddkn' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pddkn' => Yii::t('app', 'Pendidikan'),
            'jumlah_bea' => Yii::t('app', 'Jumlah Beasiswa '),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPddkn()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pddkn']);
    }

    public function getPddknNama()
    {
        return $this->pendidikan->pendidikan;
    }

    public function getBea($id_pddkn) 
    {
        $data = Beasiswa::find()
                ->where(['id_pddkn' => $id_pddkn])
                ->select(['id','jumlah_bea AS name'])
                ->asArray()
                ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }
}
