<?php

namespace InetStudio\Requests\Forms\Observers;

use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Observers\FormObserverContract;

/**
 * Class FormObserver.
 */
class FormObserver implements FormObserverContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    public $services;

    /**
     * FormObserver constructor.
     */
    public function __construct()
    {
        $this->services['formsObserver'] = app()->make('InetStudio\Requests\Forms\Contracts\Services\Back\FormsObserverServiceContract');
    }

    /**
     * Событие "объект создается".
     *
     * @param FormModelContract $item
     */
    public function creating(FormModelContract $item): void
    {
        $this->services['formsObserver']->creating($item);
    }

    /**
     * Событие "объект создан".
     *
     * @param FormModelContract $item
     */
    public function created(FormModelContract $item): void
    {
        $this->services['formsObserver']->created($item);
    }

    /**
     * Событие "объект обновляется".
     *
     * @param FormModelContract $item
     */
    public function updating(FormModelContract $item): void
    {
        $this->services['formsObserver']->updating($item);
    }

    /**
     * Событие "объект обновлен".
     *
     * @param FormModelContract $item
     */
    public function updated(FormModelContract $item): void
    {
        $this->services['formsObserver']->updated($item);
    }

    /**
     * Событие "объект подписки удаляется".
     *
     * @param FormModelContract $item
     */
    public function deleting(FormModelContract $item): void
    {
        $this->services['formsObserver']->deleting($item);
    }

    /**
     * Событие "объект удален".
     *
     * @param FormModelContract $item
     */
    public function deleted(FormModelContract $item): void
    {
        $this->services['formsObserver']->deleted($item);
    }
}
