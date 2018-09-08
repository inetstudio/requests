<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesControllerContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\ShowResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\IndexResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\FormResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\DestroyResponseContract;

/**
 * Class MessagesController.
 */
class MessagesController extends Controller implements MessagesControllerContract
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
        $this->services['messages'] = app()->make('InetStudio\Requests\Messages\Contracts\Services\Back\MessagesServiceContract');
        $this->services['dataTables'] = app()->make('InetStudio\Requests\Messages\Contracts\Services\Back\MessagesDataTableServiceContract');
    }

    /**
     * Список объектов.
     *
     * @return IndexResponseContract
     */
    public function index(): IndexResponseContract
    {
        $table = $this->services['dataTables']->html();

        return app()->makeWith(IndexResponseContract::class, [
            'data' => compact('table'),
        ]);
    }

    /**
     * Получение объекта.
     *
     * @param int $id
     *
     * @return ShowResponseContract
     */
    public function show(int $id = 0): ShowResponseContract
    {
        $item = $this->services['messages']->getMessageObject($id);

        return app()->makeWith(ShowResponseContract::class, [
            'item' => $item,
        ]);
    }

    /**
     * Редактирование объекта.
     *
     * @param int $id
     *
     * @return FormResponseContract
     */
    public function edit(int $id = 0): FormResponseContract
    {
        $item = $this->services['messages']->getMessageObject($id);

        return app()->makeWith(FormResponseContract::class, [
            'data' => compact('item'),
        ]);
    }

    /**
     * Удаление объекта.
     *
     * @param int $id
     *
     * @return DestroyResponseContract
     */
    public function destroy(int $id = 0): DestroyResponseContract
    {
        $result = $this->services['messages']->destroy($id);

        return app()->makeWith(DestroyResponseContract::class, [
            'result' => (!! $result),
        ]);
    }
}
