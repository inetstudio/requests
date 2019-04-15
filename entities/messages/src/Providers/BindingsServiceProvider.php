<?php

namespace InetStudio\Requests\Messages\Providers;

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
        'InetStudio\Requests\Messages\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\Requests\Messages\Events\Back\ModifyItemEvent',
        'InetStudio\Requests\Messages\Contracts\Events\Front\SendItemEventContract' => 'InetStudio\Requests\Messages\Events\Front\SendItemEvent',
        'InetStudio\Requests\Messages\Contracts\Exports\ItemsExportContract' => 'InetStudio\Requests\Messages\Exports\ItemsExport',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\ResourceController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\DataController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\ExportControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\ExportController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Front\ItemsControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Front\ItemsController',
        'InetStudio\Requests\Messages\Contracts\Http\Requests\Front\SendItemRequestContract' => 'InetStudio\Requests\Messages\Http\Requests\Front\SendItemRequest',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendItemResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Front\SendItemResponse',
        'InetStudio\Requests\Messages\Contracts\Models\MessageModelContract' => 'InetStudio\Requests\Messages\Models\MessageModel',
        'InetStudio\Requests\Messages\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\Requests\Messages\Services\Back\DataTableService',
        'InetStudio\Requests\Messages\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\Requests\Messages\Services\Back\ItemsService',
        'InetStudio\Requests\Messages\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\Requests\Messages\Services\Front\ItemsService',
        'InetStudio\Requests\Messages\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\Requests\Messages\Transformers\Back\Resource\IndexTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
