<?php

namespace TaskForce\classes;

abstract class AbstractAction
{
    abstract public function getTitle(): string;

    abstract public function getCode(): string;

    abstract public function checkAccess(int $executorId, int $clientId, int $userId): bool;
}
