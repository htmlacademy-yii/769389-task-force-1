<?php

error_reporting(E_ALL);
set_exception_handler(function (Throwable $error) {
    echo sprintf('error: %s in file %s:%d', $error->getMessage(), $error->getFile(), $error->getLine());
});
include 'vendor/autoload.php';
use TaskForce\classes\Task;


$obTask = new Task(1,2);
$NextStatus = $obTask->getNextStatus(Task::ACTION_CANCEL);

$NextAction = $obTask->getNextAction(Task::STATUS_IN_WORK, Task::ROLE_IMPLEMENT);
?>
<div><?=$NextStatus?></div>
<div><?=$NextAction?></div>
