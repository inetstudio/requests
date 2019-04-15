<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/requests',
    ],
    function () {
        Route::any('messages/data', 'DataControllerContract@data')
            ->name('back.requests.messages.data.index');

        Route::get('messages/export/{form}', 'ExportControllerContract@exportItems')
            ->name('back.requests.messages.export');

        Route::resource('messages', 'ResourceControllerContract', ['as' => 'back.requests']);
    }
);

Route::group(
    [
        'namespace' => 'InetStudio\Requests\Messages\Contracts\Http\Controllers\Front',
        'middleware' => ['web'],
    ],
    function () {
        Route::post('requests/messages/send', 'ItemsControllerContract@sendItem')
            ->name('front.requests.messages.send');
    }
);
