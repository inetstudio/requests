<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesDataControllerContract;

/**
 * Class MessagesDataController.
 */
class MessagesDataController extends Controller implements MessagesDataControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    public $services;

    /**
     * MessagesController constructor.
     */
    public function __construct()
    {
        $this->services['dataTables'] = app()->make('InetStudio\Requests\Messages\Contracts\Services\Back\MessagesDataTableServiceContract');
    }

    /**
     * Получаем данные для отображения в таблице.
     *
     * @return mixed
     */
    public function data()
    {
        return $this->services['dataTables']->ajax();
    }
}
