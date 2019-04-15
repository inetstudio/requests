<?php

namespace InetStudio\Requests\Messages\Contracts\Http\Controllers\Front;

use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Subscription\Contracts\Services\Front\SubscriptionServiceContract;
use InetStudio\Requests\Messages\Contracts\Http\Requests\Front\SendItemRequestContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendItemResponseContract;
use InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract as FormsServiceContract;
use InetStudio\Requests\Messages\Contracts\Services\Front\ItemsServiceContract as MessagesServiceContract;

/**
 * Interface ItemsControllerContract.
 */
interface ItemsControllerContract
{
    /**
     * Отправка сообщения.
     *
     * @param  FormsServiceContract  $formsService
     * @param  MessagesServiceContract  $messagesService
     * @param  SubscriptionServiceContract  $subscriptionService
     * @param  SendItemRequestContract  $request
     *
     * @return SendItemResponseContract
     *
     * @throws BindingResolutionException
     */
    public function sendItem(
        FormsServiceContract $formsService,
        MessagesServiceContract $messagesService,
        SubscriptionServiceContract $subscriptionService,
        SendItemRequestContract $request
    ): SendItemResponseContract;
}
