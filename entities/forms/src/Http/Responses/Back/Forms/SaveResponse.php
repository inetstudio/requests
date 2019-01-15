<?php

namespace InetStudio\Requests\Forms\Http\Responses\Back\Forms;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\SaveResponseContract;

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
     * @param FormModelContract $item
     */
    public function __construct(FormModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return RedirectResponse
     */
    public function toResponse($request): RedirectResponse
    {
        return response()->redirectToRoute('back.requests.forms.edit', [
            $this->item->fresh()->id,
        ]);
    }
}
