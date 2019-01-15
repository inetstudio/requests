<?php

namespace InetStudio\Requests\Messages\Http\Responses\Back\Messages;

use Illuminate\View\View;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Messages\Contracts\Http\Responses\Back\Messages\FormResponseContract;

/**
 * Class FormResponse.
 */
class FormResponse implements FormResponseContract, Responsable
{
    /**
     * @var array
     */
    protected $data;

    /**
     * FormResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Возвращаем ответ при открытии формы объекта.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return View
     */
    public function toResponse($request): View
    {
        return view('admin.module.requests.messages::back.pages.form', $this->data);
    }
}
