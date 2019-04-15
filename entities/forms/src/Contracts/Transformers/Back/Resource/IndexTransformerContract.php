<?php

namespace InetStudio\Requests\Forms\Contracts\Transformers\Back\Resource;

use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  FormModelContract  $item
     *
     * @return array
     */
    public function transform(FormModelContract $item): array;
}
