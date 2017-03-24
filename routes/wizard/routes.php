<?php

Route::group(['prefix' => 'wizard'], function() {
    Route::get('/', 'Wizard\HomeWizardController@index');
});
