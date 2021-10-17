<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "completing_task".
 *
 * @property int $id
 * @property int $status_completed_id
 * @property string|null $comment_completing
 * @property int|null $stars
 */
class CompletingTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'completing_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_completed_id'], 'required'],
            [['status_completed_id', 'stars'], 'integer'],
            [['comment_completing'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_completed_id' => 'Status Completed ID',
            'comment_completing' => 'Comment Completing',
            'stars' => 'Stars',
        ];
    }
}
