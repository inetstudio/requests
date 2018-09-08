<?php

namespace InetStudio\Requests\Forms\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;
use InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsUtilityControllerContract;

/**
 * Class FormsUtilityController.
 */
class FormsUtilityController extends Controller implements FormsUtilityControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    public $services;

    /**
     * FormsUtilityController constructor.
     */
    public function __construct()
    {
        $this->services['forms'] = app()->make('InetStudio\Requests\Forms\Contracts\Services\Back\FormsServiceContract');
    }

    /**
     * Возвращаем формы для поля.
     *
     * @param Request $request
     *
     * @return SuggestionsResponseContract
     */
    public function getSuggestions(Request $request): SuggestionsResponseContract
    {
        $search = $request->get('q');
        $type = $request->get('type');

        $data = $this->services['forms']->getSuggestions($search, $type);

        return app()->makeWith(SuggestionsResponseContract::class, [
            'suggestions' => $data,
        ]);
    }
}
