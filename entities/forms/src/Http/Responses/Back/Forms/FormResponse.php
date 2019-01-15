<?php

namespace InetStudio\Requests\Forms\Http\Responses\Back\Forms;

use Illuminate\View\View;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Requests\Forms\Contracts\Http\Responses\Back\Forms\FormResponseContract;

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
        return view('admin.module.requests.forms::back.pages.form', $this->data);
    }
}
