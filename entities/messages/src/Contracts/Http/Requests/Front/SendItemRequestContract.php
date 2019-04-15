<?php

namespace InetStudio\Requests\Messages\Contracts\Http\Requests\Front;

/**
 * Interface SendItemRequestContract.
 */
interface SendItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool;

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array;

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array;

    /**
     * Get all of the input and files for the request.
     *
     * @param  array|mixed  $keys
     *
     * @return array
     */
    public function all($keys = null);

    /**
     * Determine if the request contains a given input item key.
     *
     * @param  string|array  $key
     * @return bool
     */
    public function has($key);

    /**
     * This method belongs to Symfony HttpFoundation and is not usually needed when using Laravel.
     *
     * Instead, you may use the "input" method.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null);
}
