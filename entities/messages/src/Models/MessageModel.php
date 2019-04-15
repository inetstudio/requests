<?php

namespace InetStudio\Requests\Messages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InetStudio\AdminPanel\Models\Traits\HasJSONColumns;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class MessageModel.
 */
class MessageModel extends Model implements MessageModelContract
{
    use SoftDeletes;
    use HasJSONColumns;
    use BuildQueryScopeTrait;

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
        'form_id',
        'additional_info',
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
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'form_id',
            'additional_info',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'form' => function (HasOne $formQuery) {
                $formQuery->select(['id', 'title', 'alias', 'messages_limit']);
            },
        ];
    }

    /**
     * Сеттер атрибута form_id.
     *
     * @param $value
     */
    public function setFormIdAttribute($value): void
    {
        $this->attributes['form_id'] = (int) $value;
    }

    /**
     * Сеттер атрибута additional_info.
     *
     * @param $value
     */
    public function setAdditionalInfoAttribute($value): void
    {
        $this->attributes['additional_info'] = json_encode((array) $value);
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    /**
     * Обратное отношение "один ко многим" с моделью формы.
     *
     * @return HasOne
     *
     * @throws BindingResolutionException
     */
    public function form(): HasOne
    {
        $formModel = app()->make('InetStudio\Requests\Forms\Contracts\Models\FormModelContract');

        return $this->hasOne(
            get_class($formModel),
            'id',
            'form_id'
        );
    }
}
