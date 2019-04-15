<?php

namespace InetStudio\Requests\Forms\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  FormModelContract  $model
     */
    public function __construct(FormModelContract $model)
    {
        parent::__construct($model);
    }
}
