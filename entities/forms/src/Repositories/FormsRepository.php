<?php

namespace InetStudio\Requests\Forms\Repositories;

use InetStudio\AdminPanel\Repositories\BaseRepository;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Repositories\FormsRepositoryContract;

/**
 * Class FormsRepository.
 */
class FormsRepository extends BaseRepository implements FormsRepositoryContract
{
    /**
     * FormsRepository constructor.
     *
     * @param FormModelContract $model
     */
    public function __construct(FormModelContract $model)
    {
        $this->model = $model;

        $this->defaultColumns = ['id', 'title', 'alias', 'messages_limit'];
        $this->relations = [
            'messages' => function ($query) {
                $query->select(['id', 'form_id', 'additional_info']);
            },
        ];
    }
}
