<?php

namespace InetStudio\Requests\Forms\Services\Back;

use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Services\Back\FormsObserverServiceContract;

/**
 * Class FormsObserverService.
 */
class FormsObserverService implements FormsObserverServiceContract
{
    /**
     * @var
     */
    public $repository;

    /**
     * FormsObserverService constructor.
     */
    public function __construct()
    {
        $this->repository = app()->make('InetStudio\Requests\Forms\Contracts\Repositories\FormsRepositoryContract');
    }

    /**
     * Событие "объект создается".
     *
     * @param FormModelContract $item
     */
    public function creating(FormModelContract $item): void
    {
    }

    /**
     * Событие "объект создан".
     *
     * @param FormModelContract $item
     */
    public function created(FormModelContract $item): void
    {
    }

    /**
     * Событие "объект обновляется".
     *
     * @param FormModelContract $item
     */
    public function updating(FormModelContract $item): void
    {
    }

    /**
     * Событие "объект обновлен".
     *
     * @param FormModelContract $item
     */
    public function updated(FormModelContract $item): void
    {
    }

    /**
     * Событие "объект подписки удаляется".
     *
     * @param FormModelContract $item
     */
    public function deleting(FormModelContract $item): void
    {
    }

    /**
     * Событие "объект удален".
     *
     * @param FormModelContract $item
     */
    public function deleted(FormModelContract $item): void
    {
    }
}
