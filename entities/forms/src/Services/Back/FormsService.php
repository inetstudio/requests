<?php

namespace InetStudio\Requests\Forms\Services\Back;

use League\Fractal\Manager;
use Illuminate\Support\Facades\Session;
use League\Fractal\Serializer\DataArraySerializer;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Services\Back\FormsServiceContract;
use InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveFormRequestContract;

/**
 * Class FormsService.
 */
class FormsService implements FormsServiceContract
{
    /**
     * @var
     */
    public $repository;

    /**
     * FormsService constructor.
     */
    public function __construct()
    {
        $this->repository = app()->make('InetStudio\Requests\Forms\Contracts\Repositories\FormsRepositoryContract');
    }

    /**
     * Возвращаем объект модели.
     *
     * @param int $id
     *
     * @return FormModelContract
     */
    public function getFormObject(int $id = 0)
    {
        return $this->repository->getItemByID($id);
    }

    /**
     * Получаем объекты по списку id.
     *
     * @param array|int $ids
     * @param array $params
     *
     * @return mixed
     */
    public function getFormsByIDs($ids, array $params = [])
    {
        return $this->repository->getItemsByIDs($ids, $params);
    }

    /**
     * Получаем все объекты.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getAllForms(array $params = [])
    {
        return $this->repository->getAllItems($params);
    }

    /**
     * Сохраняем модель.
     *
     * @param SaveFormRequestContract $request
     * @param int $id
     *
     * @return FormModelContract
     */
    public function save(SaveFormRequestContract $request, int $id): FormModelContract
    {
        $action = ($id) ? 'отредактирована' : 'создана';
        $item = $this->repository->save($request->only($this->repository->getModel()->getFillable()), $id);

        event(app()->makeWith('InetStudio\Requests\Forms\Contracts\Events\Back\ModifyFormEventContract', [
            'object' => $item,
        ]));

        Session::flash('success', 'Форма «'.$item->title.'» успешно '.$action);

        return $item;
    }

    /**
     * Удаляем модель.
     *
     * @param int $id
     *
     * @return bool|null
     */
    public function destroy(int $id): ?bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * Возвращаем подсказки.
     *
     * @param string $search
     * @param $type
     *
     * @return array
     */
    public function getSuggestions(string $search, $type): array
    {
        $items = $this->repository->searchItems([['title', 'LIKE', '%'.$search.'%']]);

        $resource = (app()->makeWith('InetStudio\Requests\Forms\Contracts\Transformers\Back\SuggestionTransformerContract', [
            'type' => $type,
        ]))->transformCollection($items);

        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        $transformation = $manager->createData($resource)->toArray();

        if ($type && $type == 'autocomplete') {
            $data['suggestions'] = $transformation['data'];
        } else {
            $data['items'] = $transformation['data'];
        }

        return $data;
    }
}
