<?php

namespace InetStudio\Requests\Messages\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use InetStudio\Requests\Messages\Contracts\Exports\MessagesExportContract;

/**
 * Class MessagesExport.
 */
class MessagesExport implements MessagesExportContract, FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    /**
     * Алиас формы.
     *
     * @var string
     */
    protected $form;

    /**
     * @var
     */
    protected $messagesRepository;

    protected $headings;

    /**
     * MessagesExport constructor.
     *
     * @param string $form
     */
    public function __construct(string $form)
    {
        $this->form = $form;
        $this->messagesRepository = app()->make('InetStudio\Requests\Messages\Contracts\Repositories\MessagesRepositoryContract');

        $randomMessage = $this->messagesRepository->getItemsQuery([
            'relations' => ['form'],
            'random' => true,
        ])->whereHas('form', function ($query) use ($form) {
            $query->where('alias', '=', $form);
        })->first();

        $headings = [];
        if ($randomMessage) {
            $headings = array_keys($randomMessage->additional_info);

            array_unshift($headings, 'Время заявки');
        }

        $this->headings = $headings;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->messagesRepository->getItemsQuery([
            'columns' => ['created_at'],
            'relations' => ['form'],
        ])->whereHas('form', function ($query) {
            $query->where('alias', '=', $this->form);
        });
    }

    /**
     * @param $message
     *
     * @return array
     */
    public function map($message): array
    {
        $messageData = $message->additional_info;

        $data = [];

        $data[] = Date::dateTimeToExcel($message->created_at);

        $keys = $this->headings;
        array_shift($keys);

        foreach ($keys as $key) {
            $value = $messageData[$key] ?? '';

            if (is_array($value)) {
                $value = implode(',', $value);
            }

            $data[] = $value;
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
