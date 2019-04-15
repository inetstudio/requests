<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Subscription\Contracts\Services\Front\SubscriptionServiceContract;
use InetStudio\Requests\Messages\Contracts\Http\Requests\Front\SendItemRequestContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendItemResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Front\ItemsControllerContract;
use InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract as FormsServiceContract;
use InetStudio\Requests\Messages\Contracts\Services\Front\ItemsServiceContract as MessagesServiceContract;

/**
 * Class ItemsController.
 */
class ItemsController extends Controller implements ItemsControllerContract
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
    ): SendItemResponseContract {
        $item = null;

        $form = $formsService->getItemById($request->get('form_id', 0));

        if ($form && ($form->messages_limit > 0 && $form->messages_limit > $form->messages->count(
                ) || $form->messages_limit == 0)) {
            $data = $request->all();
            $item = $messagesService->save($data, 0);

            if ($request->has('subscribe-agree')) {
                $subscriptionService->subscribeByRequest($request);
            }
        }

        return $this->app->make(
            SendItemResponseContract::class,
            compact('item')
        );
    }
}
