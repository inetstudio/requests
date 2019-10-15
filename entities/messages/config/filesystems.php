<?php

return [

    /*
     * Расширение файла конфигурации app/config/filesystems.php
     * добавляет локальные диски для хранения изображений заявок
     */

    'requests_messages' => [
        'driver' => 'local',
        'root' => storage_path('app/public/requests_messages'),
        'url' => env('APP_URL').'/storage/requests_messages',
        'visibility' => 'public',
    ],

];
