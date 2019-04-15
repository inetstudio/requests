<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Back;

use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Messages\Contracts\Exports\ItemsExportContract;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\ExportControllerContract;

/**
 * Class ExportController.
 */
class ExportController extends Controller implements ExportControllerContract
{
    /**
     * Экспортируем объекты.
     *
     * @param  string  $form
     *
     * @return BinaryFileResponse
     *
     * @throws BindingResolutionException
     */
    public function exportItems(string $form): BinaryFileResponse
    {
        $export = app()->make(
            ItemsExportContract::class,
            compact('form')
        );

        return Excel::download($export, time().'.xlsx');
    }
}
