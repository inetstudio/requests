<?php

namespace InetStudio\Requests\Forms\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\Requests\Forms\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

/**
 * Interface UtilityControllerContract.
 */
interface UtilityControllerContract
{
    /**
     * Возвращаем опросы для поля.
     *
     * @param  UtilityServiceContract  $utilityService
     * @param  Request  $request
     *
     * @return SuggestionsResponseContract
     */
    public function getSuggestions(
        UtilityServiceContract $utilityService,
        Request $request
    ): SuggestionsResponseContract;
}
