<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property int|null $price_offer
 * @property string|null $comment
 * @property int $user_id
 * @property int $task_id
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price_offer', 'user_id', 'task_id'], 'integer'],
            [['comment'], 'string'],
            [['user_id', 'task_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_offer' => 'Price Offer',
            'comment' => 'Comment',
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
        ];
    }
}
