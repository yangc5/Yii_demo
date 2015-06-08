<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $data
 * @property integer $create_time
 * @property integer $update_time
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'data'], 'required'],
            [['title', 'data'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'data' => 'Data',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function behaviors(){
        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
//                ],
//            ],
//            'value' => new Expression('NOW()')
        ];
    }

}
