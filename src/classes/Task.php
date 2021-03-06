<?php
namespace TaskForce\classes;
class Task
{
    // Стастусы задания
    const STATUS_NEW = 'new'; // Новое
    const STATUS_IN_WORK = 'in_work'; // В работе
    const STATUS_DONE = 'done'; // Выполнено
    const STATUS_FAILED = 'failed'; // Провалено
    const STATUS_CANCEL = 'cancel'; // Отмененомф
    // Действия с заданием
    const ACTION_CANCEL = 'cancel'; // Отменить задание( Заказчик)
    const ACTION_ANSWER = 'answer'; // Откликнуться на задание(Исполнитель)
    const ACTION_FINISHED = 'finished'; //  Задание выполнено(Заказчик)
    const ACTION_DECLINE = 'decline'; // Отказаться от задания(Исполнитель)
    const ACTION_ACCEPT = 'accept'; // Принять отклик от исполнителя(Заказчик)

    const ROLE_IMPLEMENT = 'implementer'; // Исполнитель
    const ROLE_CUSTOMER = 'customer'; // Заказчик
    protected $statusNames = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_DONE => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
        self::STATUS_CANCEL => 'Отменено',
    ];
    protected $actionNames = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_ANSWER => 'Откликнуться',
        self::ACTION_FINISHED => 'Выполнено',
        self::ACTION_DECLINE => 'Отказаться',
        self::ACTION_ACCEPT => 'Принять'
    ];

    protected $NextStatus = [
        self::ACTION_CANCEL => self::STATUS_CANCEL,
        self::ACTION_FINISHED => self::STATUS_DONE,
        self::ACTION_DECLINE => self::STATUS_FAILED,
        self::ACTION_ACCEPT => self::STATUS_IN_WORK,
        ];
    protected $nextAction = [
        self::STATUS_NEW => [
            self::ROLE_IMPLEMENT => ActionRespond::class,
            self::ROLE_CUSTOMER => ActionCancel::class
        ],
        self::STATUS_IN_WORK => [
            self::ROLE_IMPLEMENT => ActionReject::class,
            self::ROLE_CUSTOMER => ActionComplete::class
        ],
    ];

    protected int $idTask;
    protected int $idStatus;

    public function __construct(int $idTask, int $idStatus)
    {
        $this->idTask = $idTask;
        $this->idStatus = $idStatus;
    }

    public function getNextStatus(string $action)
    {
        return $this->nextStatus[$action] ?? null;
    }

    public function getAvailableAction(string $status, $user): ?AbstractAction
    {
        if (!isset($this->nextAction[$status][$user])) {
            return null;
        }

        return new $this->nextAction[$status][$user];
    }
}
