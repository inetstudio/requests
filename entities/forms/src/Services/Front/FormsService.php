<?php

namespace InetStudio\Requests\Forms\Services\Front;

use InetStudio\Requests\Forms\Contracts\Services\Front\FormsServiceContract;

/**
 * Class FormsService.
 */
class FormsService implements FormsServiceContract
{
    /**
     * @var
     */
    public $repository;

    /**
     * FormsService constructor.
     */
    public function __construct()
    {
        $this->repository = app()->make('InetStudio\Requests\Forms\Contracts\Repositories\FormsRepositoryContract');
    }

    /**
     * Получаем объект по id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getFormById(int $id = 0)
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
    public function getFormsByIDs($ids, array $params = [])
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
    public function getAllForms(array $params = [])
    {
        return $this->repository->getAllItems($params);
    }
}
