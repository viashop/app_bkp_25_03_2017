<?php

Route::name('control.users.admin.read')->get('/', 'Control\User\Admin\UserReadController@read');
Route::name('control.users.admin.read.search')->get('/?search={value}', 'Control\User\Admin\UserReadController@read');
Route::name('control.users.admin.delete')->get('/{id}/remove', 'Control\User\Admin\UserDeleteController@delete')->where('id', '[0-9]+');
Route::name('control.users.admin.update')->get('/{id}/edit', 'Control\User\Admin\UserUpdateController@update')->where('id', '[0-9]+');
Route::name('control.users.admin.update.post')->post('/{id}/edit', 'Control\User\Admin\UserUpdateController@updatePost')->where('id', '[0-9]+');
Route::name('control.users.admin.create')->get('/create', 'Control\User\Admin\UserCreateController@create');
Route::name('control.users.admin.create.post')->post('/create', 'Control\User\Admin\UserCreateController@createPost');
Route::name('control.users.admin.new.password')->get('/{id}/generate/new/password', 'Control\Password\GeneratePasswordController@passwordUserAdmin');
Route::name('control.users.admin.read.trashed')->get('/trashed', 'Control\User\Admin\UserReadController@readTrashed');
Route::name('control.users.admin.read.trashed.search')->get('/trashed/?search={value}', 'Control\User\Admin\UserReadController@readTrashed');
Route::name('control.users.admin.restore.trashed')->get('/{id}/trashed/restore', 'Control\User\Admin\UserUpdateController@restoreTrashed')->where('id', '[0-9]+');
Route::name('control.users.admin.update.trashed')->get('/trashed/{id}/edit/', 'Control\User\Admin\UserUpdateController@updateTrashed')->where('id', '[0-9]+');
Route::name('control.users.admin.update.trashed.post')->post('/{id}/trashed/edit/', 'Control\User\Admin\UserUpdateController@updatePostTrashed')->where('id', '[0-9]+');;
Route::name('control.users.admin.delete.trashed')->get('/{id}/trashed/remove', 'Control\User\Admin\UserDeleteController@deleteTrashed')->where('id', '[0-9]+');
