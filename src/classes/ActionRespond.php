<?php


namespace TaskForce\classes;


class ActionRespond extends AbstractAction
{

    public function getTitle(): string
    {
        return 'Откликнуться';
    }

    public function getCode(): string
    {
        return 'respond';
    }

    public function checkAccess(int $executorId, int $clientId, int $userId): bool
    {
        return $clientId !== $userId;
    }
}
