<?php

namespace InetStudio\Requests\Messages\Services\Back;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Services\Back\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  MessageModelContract  $model
     */
    public function __construct(MessageModelContract $model)
    {
        parent::__construct($model);
    }
}
