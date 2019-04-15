<?php

namespace InetStudio\Requests\Messages\Contracts\Transformers\Back\Resource;

use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  MessageModelContract  $item
     *
     * @return array
     */
    public function transform(MessageModelContract $item): array;
}
