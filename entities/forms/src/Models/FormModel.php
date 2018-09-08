<?php

namespace InetStudio\Requests\Forms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;

/**
 * Class FormModel.
 */
class FormModel extends Model implements FormModelContract
{
    use SoftDeletes;

    const ENTITY_TYPE = 'requests_form';

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
        'title', 'alias', 'messages_limit',
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

    protected $revisionCreationsEnabled = true;

    /**
     * Сеттер атрибута title.
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута slug.
     *
     * @param $value
     */
    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута messages_limit.
     *
     * @param $value
     */
    public function setMessagesLimitAttribute($value)
    {
        $this->attributes['messages_limit'] = (int) $value;
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
}
