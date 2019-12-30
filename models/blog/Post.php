<?php

namespace app\models\blog;

use Yii;
use app\models\blog\Kategori;
use amnah\yii2\user\models\User;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $judul
 * @property string $konten
 * @property integer $kategori_id
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $user_id
 *
 * @property Comment[] $comments
 * @property Kategori $kategori
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'konten', 'kategori_id', 'status'], 'required'],
            [['konten'], 'string'],
            [['kategori_id', 'status', 'create_time', 'update_time', 'user_id'], 'integer'],
            [['judul'], 'string', 'max' => 128],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori_id' => 'id']],
         
        ];
    }

    /**
     * @inheritdoc
     */

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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'judul' => Yii::t('app', 'Judul'),
            'konten' => Yii::t('app', 'Konten'),
            'kategori_id' => Yii::t('app', 'Kategori ID'),
            'status' => Yii::t('app', 'Status'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getLabel()
    {
        $l = '';
        if($this->status===0){
            $l = "Draft";
        }else{
            $l = "Publish";
        }

        return $l;
    }
}
