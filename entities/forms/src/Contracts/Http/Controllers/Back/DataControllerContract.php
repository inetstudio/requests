<?php

namespace InetStudio\Requests\Forms\Contracts\Http\Controllers\Back;

use Illuminate\Http\JsonResponse;
use InetStudio\Requests\Forms\Contracts\Services\Back\DataTableServiceContract;

/**
 * Interface DataControllerContract.
 */
interface DataControllerContract
{
    /**
     * Получаем данные для отображения в таблице.
     *
     * @param  DataTableServiceContract  $dataTableService
     *
     * @return JsonResponse
     */
    public function data(DataTableServiceContract $dataTableService): JsonResponse;
}
