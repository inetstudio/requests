<?php

namespace InetStudio\Requests\Messages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class MessagesBindingsServiceProvider.
 */
class MessagesBindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\Requests\Messages\Contracts\Events\Back\ModifyMessageEventContract' => 'InetStudio\Requests\Messages\Events\Back\ModifyMessageEvent',
        'InetStudio\Requests\Messages\Contracts\Events\Front\SendMessageEventContract' => 'InetStudio\Requests\Messages\Events\Front\SendMessageEvent',
        'InetStudio\Requests\Messages\Contracts\Exports\MessagesExportContract' => 'InetStudio\Requests\Messages\Exports\MessagesExport',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\MessagesController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesDataControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\MessagesDataController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesExportControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\MessagesExportController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Front\MessagesControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Front\MessagesController',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\DestroyResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\DestroyResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\FormResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\FormResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\IndexResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\IndexResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\ShowResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\ShowResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendMessageResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Front\SendMessageResponse',
        'InetStudio\Requests\Messages\Contracts\Models\MessageModelContract' => 'InetStudio\Requests\Messages\Models\MessageModel',
        'InetStudio\Requests\Messages\Contracts\Repositories\MessagesRepositoryContract' => 'InetStudio\Requests\Messages\Repositories\MessagesRepository',
        'InetStudio\Requests\Messages\Contracts\Services\Back\MessagesDataTableServiceContract' => 'InetStudio\Requests\Messages\Services\Back\MessagesDataTableService',
        'InetStudio\Requests\Messages\Contracts\Services\Back\MessagesServiceContract' => 'InetStudio\Requests\Messages\Services\Back\MessagesService',
        'InetStudio\Requests\Messages\Contracts\Services\Front\MessagesServiceContract' => 'InetStudio\Requests\Messages\Services\Front\MessagesService',
        'InetStudio\Requests\Messages\Contracts\Transformers\Back\MessageTransformerContract' => 'InetStudio\Requests\Messages\Transformers\Back\MessageTransformer',
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
