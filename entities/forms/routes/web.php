<?php

Route::group([
    'namespace' => 'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back',
    'middleware' => ['web', 'back.auth'],
    'prefix' => 'back/requests',
], function () {
    Route::any('forms/data', 'FormsDataControllerContract@data')->name('back.requests.forms.data.index');
    Route::post('forms/suggestions', 'FormsUtilityControllerContract@getSuggestions')->name('back.requests.forms.getSuggestions');

    Route::resource('forms', 'FormsControllerContract', ['as' => 'back.requests']);
});
