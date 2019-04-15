<?php

namespace InetStudio\Requests\Forms\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract, Responsable
{
    /**
     * @var FormModelContract
     */
    protected $item;

    /**
     * SaveResponse constructor.
     *
     * @param  FormModelContract  $item
     */
    public function __construct(FormModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->redirectToRoute(
            'back.requests.forms.edit',
            [
                $this->item->fresh()->id,
            ]
        );
    }
}
