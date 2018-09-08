<?php

Route::group([
    'namespace' => 'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back',
    'middleware' => ['web', 'back.auth'],
    'prefix' => 'back/requests',
], function () {
    Route::any('messages/data', 'MessagesDataControllerContract@data')->name('back.requests.messages.data.index');

    Route::resource('messages', 'MessagesControllerContract', ['as' => 'back.requests']);
});
