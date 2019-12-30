<?php

namespace app\models\blog;

use Yii;
use app\models\blog\Post;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property Post[] $posts
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['create_time', 'update_time'], 'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Kategori'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['kategori_id' => 'id']);
    }

    public static function dropdown()
    {
        $models = static::find()->all();
        foreach ($models as $model) {

            $dropdown[$model->id] = $model->nama;
        }

        return $dropdown;
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
            'class' => \yii\behaviors\TimestampBehavior::className(),
            'attributes' => [
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
                \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
                ],
                
            ],
        ];
    }
}
