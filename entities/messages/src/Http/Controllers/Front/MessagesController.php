<?php

namespace InetStudio\Requests\Messages\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendMessageResponseContract;
use InetStudio\Requests\Messages\Contracts\Http\Controllers\Front\MessagesControllerContract;

/**
 * Class MessagesController.
 */
class MessagesController extends Controller implements MessagesControllerContract
{
    /**
     * Отправка сообщения.
     *
     * @param Request $request
     *
     * @return SendMessageResponseContract
     */
    public function sendMessage(Request $request): SendMessageResponseContract
    {
        $message = null;

        $form = app()->make('InetStudio\Requests\Forms\Contracts\Services\Front\FormsServiceContract')
            ->getFormById($request->get('form_id'));

        if ($form) {
            $formRequest = app()->make('InetStudio\Requests\Messages\Contracts\Http\Requests\Front'.ucfirst($form->alias).'RequestContract');

            Validator::make($request->all(), $formRequest->rules(), $formRequest->messages())->validate();

            $message = app()->make('InetStudio\Requests\Messages\Contracts\Services\Front\MessagesServiceContract')
                ->save($request, 0);

            if ($request->has('subscribe-agree')) {
                $subscriptionService = app()->make('InetStudio\Subscription\Contracts\Services\Front\SubscriptionServiceContract');
                $subscriptionService->subscribeByRequest($request);
            }
        }

        return app()->makeWith(SendMessageResponseContract::class, [
           'item' => $message,
        ]);
    }
}
