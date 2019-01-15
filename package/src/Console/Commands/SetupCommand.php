<?php

namespace InetStudio\Requests\Console\Commands;

use InetStudio\AdminPanel\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:requests:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup requests package';

    /**
     * Инициализация команд.
     *
     * @return void
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Requests forms setup',
                'command' => 'inetstudio:requests:forms:setup',
            ],
            [
                'type' => 'artisan',
                'description' => 'Requests messages setup',
                'command' => 'inetstudio:requests:messages:setup',
            ],
        ];
    }
}
