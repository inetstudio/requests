<?php

namespace InetStudio\Requests\Messages\Services\Front;

use InetStudio\Requests\Messages\Contracts\Services\Front\MessagesServiceContract;

/**
 * Class MessagesService.
 */
class MessagesService implements MessagesServiceContract
{
    /**
     * @var
     */
    public $repository;

    /**
     * MessagesService constructor.
     */
    public function __construct()
    {
        $this->repository = app()->make('InetStudio\Requests\Messages\Contracts\Repositories\MessagesRepositoryContract');
    }

    /**
     * Получаем объект по id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getMessageById(int $id = 0)
    {
        return $this->repository->getItemByID($id);
    }

    /**
     * Получаем объекты по списку id.
     *
     * @param array|int $ids
     * @param array $params
     *
     * @return mixed
     */
    public function getMessagesByIDs($ids, array $params = [])
    {
        return $this->repository->getItemsByIDs($ids, $params);
    }

    /**
     * Получаем все объекты.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getAllMessages(array $params = [])
    {
        return $this->repository->getAllItems($params);
    }
}
