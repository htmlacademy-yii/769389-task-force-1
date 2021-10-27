<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property string $details
 * @property int $category_id
 * @property string|null $link
 * @property int|null $city_id
 * @property int $status_id
 * @property int|null $price_task
 * @property string|null $deadline
 * @property int $user_id
 * @property int $executor_id
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'details', 'category_id', 'status_id', 'user_id', 'executor_id'], 'required'],
            [['category_id', 'city_id', 'status_id', 'price_task', 'user_id', 'executor_id'], 'integer'],
            [['deadline'], 'safe'],
            [['title', 'link'], 'string', 'max' => 100],
            [['details'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'details' => 'Details',
            'category_id' => 'Category ID',
            'link' => 'Link',
            'city_id' => 'City ID',
            'status_id' => 'Status ID',
            'price_task' => 'Price Task',
            'deadline' => 'Deadline',
            'user_id' => 'User ID',
            'executor_id' => 'Executor ID',
        ];
    }
}
