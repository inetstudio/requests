<?php

namespace InetStudio\Requests\Forms\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveFormRequestContract;
use InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsControllerContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\FormResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\SaveResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\ShowResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\IndexResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\DestroyResponseContract;

/**
 * Class FormsController.
 */
class FormsController extends Controller implements FormsControllerContract
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
        $this->services['forms'] = app()->make('InetStudio\Requests\Forms\Contracts\Services\Back\FormsServiceContract');
        $this->services['dataTables'] = app()->make('InetStudio\Requests\Forms\Contracts\Services\Back\FormsDataTableServiceContract');
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
        $item = $this->services['forms']->getFormObject($id);

        return app()->makeWith(ShowResponseContract::class, [
            'item' => $item,
        ]);
    }

    /**
     * Создание объекта.
     *
     * @return FormResponseContract
     */
    public function create(): FormResponseContract
    {
        $item = $this->services['forms']->getFormObject();

        return app()->makeWith(FormResponseContract::class, [
            'data' => compact('item'),
        ]);
    }

    /**
     * Создание объекта.
     *
     * @param SaveFormRequestContract $request
     *
     * @return SaveResponseContract
     */
    public function store(SaveFormRequestContract $request): SaveResponseContract
    {
        return $this->save($request);
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
        $item = $this->services['forms']->getFormObject($id);

        return app()->makeWith(FormResponseContract::class, [
            'data' => compact('item'),
        ]);
    }

    /**
     * Обновление объекта.
     *
     * @param SaveFormRequestContract $request
     * @param int $id
     *
     * @return SaveResponseContract
     */
    public function update(SaveFormRequestContract $request, int $id = 0): SaveResponseContract
    {
        return $this->save($request, $id);
    }

    /**
     * Сохранение объекта.
     *
     * @param SaveFormRequestContract $request
     * @param int $id
     *
     * @return SaveResponseContract
     */
    private function save(SaveFormRequestContract $request, int $id = 0): SaveResponseContract
    {
        $item = $this->services['forms']->save($request, $id);

        return app()->makeWith(SaveResponseContract::class, [
            'item' => $item,
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
        $result = $this->services['forms']->destroy($id);

        return app()->makeWith(DestroyResponseContract::class, [
            'result' => (!! $result),
        ]);
    }
}
