<?php

namespace InetStudio\Requests\Forms\Transformers\Back\Utility;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Transformers\Back\Utility\SuggestionTransformerContract;

/**
 * Class SuggestionTransformer.
 */
class SuggestionTransformer extends TransformerAbstract implements SuggestionTransformerContract
{
    /**
     * @var string
     */
    protected $type;

    /**
     * SuggestionTransformer constructor.
     *
     * @param  string  $type
     */
    public function __construct(string $type = '')
    {
        $this->type = $type;
    }

    /**
     * Трансформация данных.
     *
     * @param  FormModelContract  $item
     *
     * @return array
     */
    public function transform(FormModelContract $item): array
    {
        return ($this->type == 'autocomplete')
            ? [
                'value' => $item['title'],
                'data' => [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'alias' => $item['alias'],
                ],
            ]
            : [
                'id' => $item['id'],
                'name' => $item['title'],
            ];
    }

    /**
     * Обработка коллекции объектов.
     *
     * @param $items
     *
     * @return FractalCollection
     */
    public function transformCollection($items): FractalCollection
    {
        return new FractalCollection($items, $this);
    }
}
