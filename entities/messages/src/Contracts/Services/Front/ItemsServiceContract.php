<?php

namespace InetStudio\Requests\Messages\Contracts\Services\Front;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return MessageModelContract
     */
    public function save(array $data, int $id): MessageModelContract;
}
