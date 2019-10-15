<?php

namespace InetStudio\Requests\Messages\Exports;

use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Messages\Contracts\Exports\ItemsExportContract;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;

/**
 * Class ItemsExport.
 */
class ItemsExport implements ItemsExportContract, FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    /**
     * Алиас формы.
     *
     * @var string
     */
    protected $form;

    /**
     * @var MessageModelContract
     */
    protected $model;

    /**
     * @var array
     */
    protected $headings;

    /**
     * ItemsExport constructor.
     *
     * @param  string  $form
     *
     * @throws BindingResolutionException
     */
    public function __construct(string $form)
    {
        $this->form = $form;
        $this->model = app()->make(
            'InetStudio\Requests\Messages\Contracts\Models\MessageModelContract'
        );

        $randomMessage = $this->model->buildQuery(
                [
                    'relations' => ['form'],
                    'random' => true,
                ]
            )->whereHas(
                'form',
                function ($query) use ($form) {
                    $query->where('alias', '=', $form);
                }
            )->first();

        $headings = [];
        if ($randomMessage) {
            $headings = array_keys($randomMessage->additional_info);

            array_unshift($headings, 'Время заявки');
        }

        $this->headings = $headings;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return $this->model->buildQuery(
                [
                    'columns' => ['created_at'],
                    'relations' => ['form', 'media'],
                ]
            )->whereHas(
                'form',
                function ($query) {
                    $query->where('alias', '=', $this->form);
                }
            );
    }

    /**
     * @param $item
     *
     * @return array
     */
    public function map($item): array
    {
        $messageData = $item->additional_info;

        $data = [];

        $data[] = Date::dateTimeToExcel($item->created_at);

        $keys = $this->headings;
        array_shift($keys);

        foreach ($keys as $key) {
            $value = $messageData[$key] ?? '';

            if (is_array($value)) {
                $value = implode(',', $value);
            }

            $data[] = $value;
        }

        foreach ($item->media as $mediaItem) {
            $data[] = $mediaItem->getFullUrl();
        }

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return $this->headings;
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }
}
