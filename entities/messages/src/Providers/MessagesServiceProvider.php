<?php

namespace InetStudio\Requests\Messages\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class MessagesServiceProvider.
 */
class MessagesServiceProvider extends ServiceProvider
{
    /**
     * Загрузка сервиса.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerTranslations();
    }

    /**
     * Регистрация команд.
     *
     * @return void
     */
    protected function registerConsoleCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                'InetStudio\Requests\Messages\Console\Commands\SetupCommand',
            ]);
        }
    }

    /**
     * Регистрация ресурсов.
     *
     * @return void
     */
    protected function registerPublishes(): void
    {
        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateMessagesTables')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_requests_messages_tables.php.stub' => database_path('migrations/'.$timestamp.'_create_requests_messages_tables.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Регистрация путей.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Регистрация представлений.
     *
     * @return void
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.requests.messages');
    }

    /**
     * Регистрация переводов.
     *
     * @return void
     */
    protected function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'admin.module.requests.messages');
    }
}
