<?php

Route::group([
    'namespace' => 'InetStudio\Requests\Messages\Contracts\Http\Controllers\Back',
    'middleware' => ['web', 'back.auth'],
    'prefix' => 'back/requests',
], function () {
    Route::any('messages/data', 'MessagesDataControllerContract@data')->name('back.requests.messages.data.index');
    Route::get('messages/export/{form}', 'MessagesExportControllerContract@exportMessages')->name('back.requests.messages.export');

    Route::resource('messages', 'MessagesControllerContract', ['as' => 'back.requests']);
});

Route::group([
    'namespace' => 'InetStudio\Requests\Messages\Contracts\Http\Controllers\Front',
    'middleware' => ['web'],
], function () {
    Route::post('requests/messages/send', 'MessagesControllerContract@sendMessage')->name('front.requests.messages.send');
});
