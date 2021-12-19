<?php

namespace frontend\controllers;

use app\models\User;
use TaskForce\classes\Task;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users = User::find()
            ->where(['role_id' => Task::ROLE_IMPLEMENT])
            ->all();

        return $this->render('index',['users' => $users]);
    }

}
