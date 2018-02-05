<?php

namespace backend\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii\db\Expression;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $data
 * @property int $create_time
 * @property int $update_time
 */
class Posts extends yii\db\ActiveRecord
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
			[['title','data'],'required'],
            [['data'], 'string'],
            [['comment'], 'string'],
            [['create_time', 'update_time'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

	/*public function behaviors()
	{
		 return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => 'creation_time',
					ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
				],
				'value' => new Expression('NOW()'),
			],
		];
		
	}*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'data' => 'Data',
            'comment' => 'Comment',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
