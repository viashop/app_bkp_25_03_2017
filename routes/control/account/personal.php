<?php

Route::name('control.users.personal.read')->get('/', 'Control\Account\PersonalController@read');
Route::name('control.users.personal.read.post')->post('/', 'Control\Account\PersonalController@updatePost');
