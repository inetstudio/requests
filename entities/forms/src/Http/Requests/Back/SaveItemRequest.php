<?php

namespace InetStudio\Requests\Forms\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\Requests\Forms\Contracts\Http\Requests\Back\SaveItemRequestContract;

/**
 * Class SaveItemRequest.
 */
class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле «Заголовок» обязательно для заполнения',
            'title.max' => 'Поле «Заголовок» не должно превышать 255 символов',

            'alias.required' => 'Поле «Алиас» обязательно для заполнения',
            'alias.max' => 'Поле «Алиас» не должно превышать 255 символов',
            'alias.alpha_num' => 'Поле «Алиас» может содержать только латинские символы и цифры',
            'alias.unique' => 'Такое значение поля «Алиас» уже существует',

            'messages_limit.integer' => 'Поле «Лимит сообщений» должно содержать целое число',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'alias' => 'required|max:255|alpha_num|unique:requests_forms,alias,'.$this->get('form_id'),
            'messages_limit' => 'nullable|integer',
        ];
    }
}
