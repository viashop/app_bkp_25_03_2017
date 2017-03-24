<?php

Route::name('control.users.shops.admin.read')->get('/admin', 'Control\User\Shop\UserReadController@readAdmin');
Route::name('control.users.shops.admin.read.search')->get('/admin/?search={value}', 'Control\User\Shop\UserReadController@readAdmin');
Route::name('control.users.shops.editor.read')->get('/editor', 'Control\User\Shop\UserReadController@readEditor');
Route::name('control.users.shops.editor.read.search')->get('/editor/?search={value}', 'Control\User\Shop\UserReadController@readEditor');
Route::name('control.users.shops.admin.update')->get('/{id}/admin/edit', 'Control\User\Shop\UserUpdateController@updateAdmin')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.update')->get('/{id}/editor/edit', 'Control\User\Shop\UserUpdateController@updateEditor')->where('id', '[0-9]+');
Route::name('control.users.shops.admin.update.post')->post('/{id}/admin/edit', 'Control\User\Shop\UserUpdateController@updateAdminPost')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.update.post')->post('/{id}/editor/edit', 'Control\User\Shop\UserUpdateController@updateEditorPost')->where('id', '[0-9]+');
Route::name('control.users.shops.admin.new.password')->get('/{id}/generate/new/password/admin', 'Control\Password\GeneratePasswordController@passwordUserShopAdmin')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.new.password')->get('/{id}/generate/new/password/editor', 'Control\Password\GeneratePasswordController@passwordUserShopEditor')->where('id', '[0-9]+');
