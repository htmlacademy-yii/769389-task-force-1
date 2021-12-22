<?php

namespace frontend\controllers;

use app\models\Task;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $tasks = Task::find()
            ->where(['status_id' => \app\Task::STATUS_NEW])
            ->orderBy(['pub_date' => SORT_DESC])
            ->all();

        return $this->render('index',['tasks' => $tasks]);
    }
}
