<?php


namespace TaskForce\classes;


class ActionCancel extends AbstractAction
{
    public function getTitle(): string
    {
        return 'Отказаться';
    }

    public function getCode(): string
    {
        return 'cancel';
    }

    public function checkAccess(int $executorId, int $clientId, int $userId): bool
    {
        return $clientId === $userId;
    }

}
