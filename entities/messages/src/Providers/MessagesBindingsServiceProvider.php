<?php

namespace InetStudio\Requests\Messages\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class MessagesBindingsServiceProvider.
 */
class MessagesBindingsServiceProvider extends ServiceProvider
{
    /**
    * @var  bool
    */
    protected $defer = true;

    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\Requests\Messages\Contracts\Events\Back\ModifyMessageEventContract' => 'InetStudio\Requests\Messages\Events\Back\ModifyMessageEvent',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\MessagesController',
        'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back\MessagesDataControllerContract' => 'InetStudio\Requests\Messages\Http\Controllers\Back\MessagesDataController',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\DestroyResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\DestroyResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\FormResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\FormResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\IndexResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\IndexResponse',
        'InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\ShowResponseContract' => 'InetStudio\Requests\Messages\Http\Responses\Back\Messages\ShowResponse',
        'InetStudio\Requests\Messages\Contracts\Models\MessageModelContract' => 'InetStudio\Requests\Messages\Models\MessageModel',
        'InetStudio\Requests\Messages\Contracts\Observers\MessageObserverContract' => 'InetStudio\Requests\Messages\Observers\MessageObserver',
        'InetStudio\Requests\Messages\Contracts\Repositories\MessagesRepositoryContract' => 'InetStudio\Requests\Messages\Repositories\MessagesRepository',
        'InetStudio\Requests\Messages\Contracts\Services\Back\MessagesDataTableServiceContract' => 'InetStudio\Requests\Messages\Services\Back\MessagesDataTableService',
        'InetStudio\Requests\Messages\Contracts\Services\Back\MessagesObserverServiceContract' => 'InetStudio\Requests\Messages\Services\Back\MessagesObserverService',
        'InetStudio\Requests\Messages\Contracts\Services\Back\MessagesServiceContract' => 'InetStudio\Requests\Messages\Services\Back\MessagesService',
        'InetStudio\Requests\Messages\Contracts\Services\Front\MessagesServiceContract' => 'InetStudio\Requests\Messages\Services\Front\MessagesService',
        'InetStudio\Requests\Messages\Contracts\Transformers\Back\MessageTransformerContract' => 'InetStudio\Requests\Messages\Transformers\Back\MessageTransformer',
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
