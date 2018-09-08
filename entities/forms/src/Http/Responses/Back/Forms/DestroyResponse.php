<?php

namespace InetStudio\Requests\Forms\Http\Responses\Back\Forms;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\DestroyResponseContract;

/**
 * Class DestroyResponse.
 */
class DestroyResponse implements DestroyResponseContract, Responsable
{
    /**
     * @var bool
     */
    private $result;

    /**
     * DestroyResponse constructor.
     *
     * @param bool $result
     */
    public function __construct(bool $result)
    {
        $this->result = $result;
    }

    /**
     * Возвращаем ответ при удалении объекта.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json([
            'success' => $this->result,
        ]);
    }
}
