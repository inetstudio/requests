<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Back;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesExportControllerContract;

/**
 * Class MessagesExportController.
 */
class MessagesExportController extends Controller implements MessagesExportControllerContract
{
    /**
     * Экспортируем заявки.
     *
     * @param string $form
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportMessages(string $form)
    {
        $export = app()->makeWith('InetStudio\Requests\Messages\Contracts\Exports\MessagesExportContract', compact('form'));

        return Excel::download($export, time().'.xlsx');
    }
}
