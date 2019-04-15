<?php

namespace InetStudio\Requests\Forms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class FormModel.
 */
class FormModel extends Model implements FormModelContract
{
    use SoftDeletes;
    use BuildQueryScopeTrait;

    const ENTITY_TYPE = 'requests_form';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'requests_forms';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'alias',
        'messages_limit',
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
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'title',
            'alias',
            'messages_limit',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'messages' => function (HasMany $messagesQuery) {
                $messagesQuery->select(['id', 'form_id', 'additional_info']);
            },
        ];
    }

    /**
     * Сеттер атрибута title.
     *
     * @param $value
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута alias.
     *
     * @param $value
     */
    public function setAliasAttribute($value): void
    {
        $this->attributes['alias'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута messages_limit.
     *
     * @param $value
     */
    public function setMessagesLimitAttribute($value): void
    {
        $this->attributes['messages_limit'] = (int) $value;
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
     * Отношение "один ко многим" с моделью сообщений.
     *
     * @return HasMany
     *
     * @throws BindingResolutionException
     */
    public function messages(): HasMany
    {
        $messageModel = app()->make('InetStudio\Requests\Messages\Contracts\Models\MessageModelContract');

        return $this->hasMany(
            get_class($messageModel),
            'form_id',
            'id'
        );
    }
}
