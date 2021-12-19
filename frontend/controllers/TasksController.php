<?php

namespace frontend\controllers;

use app\models\Task;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $tasks = Task::find()
            ->where(['status_id' => \TaskForce\classes\Task::STATUS_NEW])
            ->all();

        return $this->render('index',['tasks' => $tasks]);
    }
}
