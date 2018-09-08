<?php

namespace InetStudio\Requests\Messages\Http\Responses\Back\Messages;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\ShowResponseContract;

/**
 * Class ShowResponse.
 */
class ShowResponse implements ShowResponseContract, Responsable
{
    /**
     * @var MessageModelContract
     */
    private $item;

    /**
     * ShowResponse constructor.
     *
     * @param MessageModelContract $item
     */
    public function __construct(MessageModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при получении объекта.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json($this->item);
    }
}
