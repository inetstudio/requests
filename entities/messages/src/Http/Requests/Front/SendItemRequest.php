<?php

namespace InetStudio\Requests\Messages\Http\Requests\Front;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Requests\Messages\Contracts\Http\Requests\Front\SendItemRequestContract;

/**
 * Class SendItemRequest.
 */
class SendItemRequest extends FormRequest implements SendItemRequestContract
{
    /**
     * @var FormRequest|null
     */
    protected $formRequest;

    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     *
     * @throws BindingResolutionException
     */
    public function authorize(): bool
    {
        $this->initializeFormRequest();

        return $this->formRequest->authorize() ?? true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     *
     * @throws BindingResolutionException
     */
    public function messages(): array
    {
        $this->initializeFormRequest();

        return $this->formRequest->messages() ?? [];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     *
     * @throws BindingResolutionException
     */
    public function rules(): array
    {
        $this->initializeFormRequest();

        return $this->formRequest->rules() ?? [];
    }

    /**
     * Инициализация нужного form request'а
     *
     * @throws BindingResolutionException
     */
    protected function initializeFormRequest(): void
    {
        if ($this->formRequest) {
            return;
        }

        $form = app()->make('InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract')
            ->getItemById($this->get('form_id', 0));

        if (! $form) {
            return;
        }

        $this->formRequest = app()->make(
            'InetStudio\Requests\Messages\Contracts\Http\Requests\Front\\'.Str::ucfirst($form->alias).'RequestContract'
        );
    }
}
