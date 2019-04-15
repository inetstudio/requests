<?php

namespace InetStudio\Requests\Forms\Contracts\Models;

/**
 * Interface FormModelContract.
 */
interface FormModelContract
{
    /**
     * Reload a fresh model instance from the database.
     *
     * @param  array|string  $with
     *
     * @return static|null
     */
    public function fresh($with = []);
}
