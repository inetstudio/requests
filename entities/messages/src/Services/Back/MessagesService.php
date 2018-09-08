<?php

namespace InetStudio\Requests\Messages\Services\Back;

use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Services\Back\MessagesServiceContract;

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
     * Возвращаем объект модели.
     *
     * @param int $id
     *
     * @return MessageModelContract
     */
    public function getMessageObject(int $id = 0)
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
     * Удаляем модель.
     *
     * @param int $id
     *
     * @return bool|null
     */
    public function destroy(int $id): ?bool
    {
        return $this->repository->destroy($id);
    }
}
