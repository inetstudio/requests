<?php

namespace InetStudio\Requests\Messages\Repositories;

use InetStudio\AdminPanel\Repositories\BaseRepository;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Repositories\MessagesRepositoryContract;

/**
 * Class MessagesRepository.
 */
class MessagesRepository extends BaseRepository implements MessagesRepositoryContract
{
    /**
     * MessagesRepository constructor.
     *
     * @param MessageModelContract $model
     */
    public function __construct(MessageModelContract $model)
    {
        $this->model = $model;

        $this->defaultColumns = ['id', 'form_id', 'additional_info'];
        $this->relations = [
            'form' => function ($query) {
                $query->select(['id', 'title', 'alias', 'messages_limit']);
            },
        ];
    }
}
