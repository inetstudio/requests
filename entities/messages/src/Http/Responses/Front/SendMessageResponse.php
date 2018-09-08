<?php

namespace InetStudio\Requests\Messages\Http\Responses\Front;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendMessageResponseContract;

/**
 * Class SendMessageResponse.
 */
class SendMessageResponse implements SendMessageResponseContract, Responsable
{
    /**
     * @var
     */
    private $item;

    /**
     * SendMessageResponse constructor.
     *
     * @param $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при отправке сообщения.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => ($this->item)
                ? trans('admin.module.requests.messages::message.send_success')
                : trans('admin.module.requests.messages::message.send_fail'),
        ]);
    }
}
