<?php

namespace InetStudio\Requests\Messages\Transformers\Back;

use League\Fractal\TransformerAbstract;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Transformers\Back\MessageTransformerContract;

/**
 * Class MessageTransformer.
 */
class MessageTransformer extends TransformerAbstract implements MessageTransformerContract
{
    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param MessageModelContract $item
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function transform(MessageModelContract $item): array
    {
        return [
            'id' => (int) $item->id,
            'form' => $item->form,
            'created_at' => (string) $item->created_at,
            'updated_at' => (string) $item->updated_at,
            'actions' => view('admin.module.requests.messages::back.partials.datatables.actions', [
                'id' => $item->id,
            ])->render(),
        ];
    }
}
