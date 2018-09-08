<?php

namespace InetStudio\Requests\Forms\Transformers\Back;

use League\Fractal\TransformerAbstract;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Transformers\Back\FormTransformerContract;

/**
 * Class FormTransformer.
 */
class FormTransformer extends TransformerAbstract implements FormTransformerContract
{
    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param FormModelContract $item
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function transform(FormModelContract $item): array
    {
        return [
            'id' => (int) $item->id,
            'title' => $item->title,
            'alias' => $item->alias,
            'created_at' => (string) $item->created_at,
            'updated_at' => (string) $item->updated_at,
            'actions' => view('admin.module.requests.forms::back.partials.datatables.actions', [
                'id' => $item->id,
            ])->render(),
        ];
    }
}
