<?php

namespace InetStudio\Requests\Forms\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsDataControllerContract;

/**
 * Class FormsDataController.
 */
class FormsDataController extends Controller implements FormsDataControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    public $services;

    /**
     * FormsController constructor.
     */
    public function __construct()
    {
        $this->services['dataTables'] = app()->make('InetStudio\Requests\Forms\Contracts\Services\Back\FormsDataTableServiceContract');
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
