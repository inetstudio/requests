<?php

namespace InetStudio\Requests\Messages\Services\Front;

use Illuminate\Support\Arr;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Services\Front\ItemsServiceContract;

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

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return MessageModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): MessageModelContract
    {
        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        $files = $data['files'];

        app()->make('InetStudio\Uploads\Contracts\Services\Front\ItemsServiceContract')
            ->attachFilesToObject($item, $files, 'requests_messages');

        event(
            app()->make(
                'InetStudio\Requests\Messages\Contracts\Events\Front\SendItemEventContract',
                compact('item')
            )
        );

        return $item;
    }
}
