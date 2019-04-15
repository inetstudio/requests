<?php

namespace InetStudio\Requests\Forms\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var  array
     */
    public $bindings = [
        'InetStudio\Requests\Forms\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\Requests\Forms\Events\Back\ModifyItemEvent',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\ResourceController',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\DataController',
        'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\Requests\Forms\Http\Controllers\Back\UtilityController',
        'InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\Requests\Forms\Http\Requests\Back\SaveItemRequest',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\Requests\Forms\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\Requests\Forms\Contracts\Models\FormModelContract' => 'InetStudio\Requests\Forms\Models\FormModel',
        'InetStudio\Requests\Forms\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\Requests\Forms\Services\Back\DataTableService',
        'InetStudio\Requests\Forms\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\Requests\Forms\Services\Back\ItemsService',
        'InetStudio\Requests\Forms\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\Requests\Forms\Services\Back\UtilityService',
        'InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\Requests\Forms\Services\Front\ItemsService',
        'InetStudio\Requests\Forms\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\Requests\Forms\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\Requests\Forms\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\Requests\Forms\Transformers\Back\Utility\SuggestionTransformer',
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
