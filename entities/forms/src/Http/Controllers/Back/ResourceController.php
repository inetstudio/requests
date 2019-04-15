<?php

namespace InetStudio\Requests\Forms\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Forms\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\Requests\Forms\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveItemRequestContract;
use InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\FormResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\SaveResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

/**
 * Class ResourceController.
 */
class ResourceController extends Controller implements ResourceControllerContract
{
    /**
     * Список объектов.
     *
     * @param  DataTableServiceContract  $dataTableService
     *
     * @return IndexResponseContract
     *
     * @throws BindingResolutionException
     */
    public function index(DataTableServiceContract $dataTableService): IndexResponseContract
    {
        $table = $dataTableService->html();

        return $this->app->make(
            IndexResponseContract::class,
            [
                'data' => compact('table'),
            ]
        );
    }

    /**
     * Получение объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return ShowResponseContract
     *
     * @throws BindingResolutionException
     */
    public function show(
        ItemsServiceContract $resourceService,
        int $id = 0
    ): ShowResponseContract {
        $item = $resourceService->getItemById($id);

        return $this->app->make(ShowResponseContract::class, compact('item'));
    }

    /**
     * Создание объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     *
     * @return FormResponseContract
     *
     * @throws BindingResolutionException
     */
    public function create(ItemsServiceContract $resourceService): FormResponseContract
    {
        $item = $resourceService->getItemById();

        return $this->app->make(
            FormResponseContract::class,
            [
                'data' => compact('item'),
            ]
        );
    }

    /**
     * Создание объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  SaveItemRequestContract  $request
     *
     * @return SaveResponseContract
     *
     * @throws BindingResolutionException
     */
    public function store(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request
    ): SaveResponseContract {
        return $this->save($resourceService, $request);
    }

    /**
     * Редактирование объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return FormResponseContract
     *
     * @throws BindingResolutionException
     */
    public function edit(
        ItemsServiceContract $resourceService,
        int $id = 0
    ): FormResponseContract {
        $item = $resourceService->getItemById($id);

        return $this->app->make(
            FormResponseContract::class,
            [
                'data' => compact('item'),
            ]
        );
    }

    /**
     * Обновление объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  SaveItemRequestContract  $request
     * @param  int  $id
     *
     * @return SaveResponseContract
     *
     * @throws BindingResolutionException
     */
    public function update(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract {
        return $this->save($resourceService, $request, $id);
    }

    /**
     * Сохранение объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  SaveItemRequestContract  $request
     * @param  int  $id
     *
     * @return SaveResponseContract
     *
     * @throws BindingResolutionException
     */
    protected function save(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract {
        $data = $request->all();

        $item = $resourceService->save($data, $id);

        return $this->app->make(SaveResponseContract::class, compact('item'));
    }

    /**
     * Удаление объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return DestroyResponseContract
     *
     * @throws BindingResolutionException
     */
    public function destroy(
        ItemsServiceContract $resourceService,
        int $id = 0
    ): DestroyResponseContract {
        $result = $resourceService->destroy($id);

        return $this->app->make(
            DestroyResponseContract::class,
            [
                'result' => ($result === null) ? false : $result,
            ]
        );
    }
}
