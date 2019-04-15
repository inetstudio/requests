<?php

namespace InetStudio\Requests\Messages\Http\Responses\Front;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Front\SendItemResponseContract;

/**
 * Class SendItemResponse.
 */
class SendItemResponse implements SendItemResponseContract, Responsable
{
    /**
     * @var MessageModelContract|null
     */
    protected $item;

    /**
     * SendItemResponse constructor.
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
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json(
            [
                'success' => true,
                'message' => ($this->item)
                    ? trans('admin.module.requests.messages::message.send_success')
                    : trans('admin.module.requests.messages::message.send_fail'),
            ]
        );
    }
}
