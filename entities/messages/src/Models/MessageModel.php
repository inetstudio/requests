<?php

namespace InetStudio\Requests\Messages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\AdminPanel\Models\Traits\HasJSONColumns;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;

/**
 * Class MessageModel.
 */
class MessageModel extends Model implements MessageModelContract
{
    use SoftDeletes;
    use HasJSONColumns;

    const ENTITY_TYPE = 'requests_message';

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'requests_messages';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'form_id', 'additional_info',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'additional_info' => 'array',
    ];

    /**
     * Сеттер атрибута form_id.
     *
     * @param $value
     */
    public function setFormIdAttribute($value)
    {
        $this->attributes['form_id'] = (int) $value;
    }

    /**
     * Сеттер атрибута additional_info.
     *
     * @param $value
     */
    public function setAdditionalInfoAttribute($value)
    {
        $this->attributes['additional_info'] = json_encode((array) $value);
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        return self::ENTITY_TYPE;
    }

    /**
     * Обратное отношение "один ко многим" с моделью формы.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne(
            app()->make('InetStudio\Requests\Forms\Contracts\Models\FormModelContract'),
            'id',
            'form_id'
        );
    }
}
