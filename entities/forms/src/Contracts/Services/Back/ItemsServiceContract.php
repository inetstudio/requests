<?php

namespace InetStudio\Requests\Forms\Contracts\Services\Back;

use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;

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
     * @return FormModelContract
     */
    public function save(array $data, int $id): FormModelContract;
}
