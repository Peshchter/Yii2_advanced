<?php


namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\models\User;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property int|null $start
 * @property int|null $finish
 * @property int|null $author_id
 * @property int|null $created_at
 * @property int|null $updated_at
 */

class Task extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time()
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','author_id','worker_id','start', 'finish'], 'required'],
            [['start', 'finish', 'author_id', 'worker_id', 'status','created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'start' => 'Начало',
            'finish' => 'Конец',
            'author_id' => 'Автор',
            'worker_id' => 'Исполнитель',
            'status' => 'Статус',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public function getWorker()
    {
        return $this->hasOne(User::class, ['id' => 'worker_id']);
    }



}