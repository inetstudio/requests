<?php

namespace InetStudio\Requests\Forms\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class FormsBindingsServiceProvider.
 */
class FormsBindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\Requests\Forms\Contracts\Events\Back\ModifyFormEventContract' => 'InetStudio\Requests\Forms\Events\Back\ModifyFormEvent',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\FormsController',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsDataControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\FormsDataController',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\FormsUtilityControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\FormsUtilityController',
        'InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveFormRequestContract' => 'InetStudio\Requests\Forms\Http\Requests\Back\SaveFormRequest',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\DestroyResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Forms\DestroyResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\FormResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Forms\FormResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\IndexResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Forms\IndexResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\SaveResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Forms\SaveResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\ShowResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Forms\ShowResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\Requests\Forms\Contracts\Models\FormModelContract' => 'InetStudio\Requests\Forms\Models\FormModel',
        'InetStudio\Requests\Forms\Contracts\Repositories\FormsRepositoryContract' => 'InetStudio\Requests\Forms\Repositories\FormsRepository',
        'InetStudio\Requests\Forms\Contracts\Services\Back\FormsDataTableServiceContract' => 'InetStudio\Requests\Forms\Services\Back\FormsDataTableService',
        'InetStudio\Requests\Forms\Contracts\Services\Back\FormsServiceContract' => 'InetStudio\Requests\Forms\Services\Back\FormsService',
        'InetStudio\Requests\Forms\Contracts\Services\Front\FormsServiceContract' => 'InetStudio\Requests\Forms\Services\Front\FormsService',
        'InetStudio\Requests\Forms\Contracts\Transformers\Back\FormTransformerContract' => 'InetStudio\Requests\Forms\Transformers\Back\FormTransformer',
        'InetStudio\Requests\Forms\Contracts\Transformers\Back\SuggestionTransformerContract' => 'InetStudio\Requests\Forms\Transformers\Back\SuggestionTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return  array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
