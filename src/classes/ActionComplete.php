<?php


namespace TaskForce\classes;


class ActionComplete extends AbstractAction
{

    public function getTitle(): string
    {
        return 'Выполнено';
    }

    public function getCode(): string
    {
        return 'complete';
    }

    public function checkAccess(int $executorId, int $clientId, int $userId): bool
    {
        return $clientId === $userId;
    }
}
