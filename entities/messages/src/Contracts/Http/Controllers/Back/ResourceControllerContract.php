<?php

namespace InetStudio\Requests\Messages\Contracts\Http\Controllers\Back;

use InetStudio\Requests\Messages\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\Requests\Messages\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\FormResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

/**
 * Interface ResourceControllerContract.
 */
interface ResourceControllerContract
{
    /**
     * Список объектов.
     *
     * @param  DataTableServiceContract  $dataTableService
     *
     * @return IndexResponseContract
     */
    public function index(DataTableServiceContract $dataTableService): IndexResponseContract;

    /**
     * Получение объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return ShowResponseContract
     */
    public function show(ItemsServiceContract $resourceService, int $id = 0): ShowResponseContract;

    /**
     * Редактирование объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return FormResponseContract
     */
    public function edit(ItemsServiceContract $resourceService, int $id = 0): FormResponseContract;

    /**
     * Удаление объекта.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  int  $id
     *
     * @return DestroyResponseContract
     */
    public function destroy(ItemsServiceContract $resourceService, int $id = 0): DestroyResponseContract;
}
