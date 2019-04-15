<?php

namespace InetStudio\Requests\Messages\Contracts\Models;

/**
 * Interface MessageModelContract.
 */
interface MessageModelContract
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
