<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\Requests\Forms\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/requests',
    ],
    function () {
        Route::any('forms/data', 'DataControllerContract@data')
            ->name('back.requests.forms.data.index');

        Route::post('forms/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.requests.forms.utility.suggestions');

        Route::resource('forms', 'ResourceControllerContract', ['as' => 'back.requests']);
    }
);
