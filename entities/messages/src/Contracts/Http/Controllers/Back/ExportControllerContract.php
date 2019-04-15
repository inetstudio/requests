<?php

namespace InetStudio\Requests\Messages\Contracts\Http\Controllers\Back;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Interface ExportControllerContract.
 */
interface ExportControllerContract
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
    public function exportItems(string $form): BinaryFileResponse;
}
