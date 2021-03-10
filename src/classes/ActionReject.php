<?php


namespace TaskForce\classes;


class ActionReject extends AbstractAction
{

    public function getTitle(): string
    {
        return 'Отказаться';
    }

    public function getCode(): string
    {
        return 'reject';
    }

    public function checkAccess(int $executorId, int $clientId, int $userId): bool
    {
        return $executorId === $userId;
    }
}
