<?php

//Config Rotas
Route::name('account.login')->get('/', 'Account\LoginController@index');

Route::group(['prefix' => 'autenticar'], function() {
    Route::post('autenticar/post', ['as' => 'account.authenticate.post', 'uses' => 'Account\LoginController@authenticate']);
});

Route::group(['prefix' => 'registrar'], function() {
    Route::get('/', ['as' => 'account.register', 'uses' => 'Account\RegisterController@register']);
    Route::post('/post', ['as' => 'account.register.post', 'uses' => 'Account\RegisterController@registerPost']);
});

Route::group(['prefix' => 'bloqueado'], function() {
    Route::get('/', ['as' => 'account.lock', 'uses' => 'Account\LockController@lock']);
    Route::post('/post', ['as' => 'account.lock.post', 'uses' => 'Account\LockController@getPostLock']);
});

Route::group(['prefix' => 'recuperar-senha'], function() {
    Route::get('/', ['as' => 'account.recover', 'uses' => 'Account\RecoverPasswordController@recover']);
    Route::post('post', ['as' => 'account.recover.post', 'uses' => 'Account\RecoverPasswordController@recoverPost']);
    Route::get('aviso', ['as' => 'account.recover.notice', 'uses' => 'Account\RecoverPasswordController@notice']);
});

Route::group(['prefix' => 'senha-redefinir'], function() {
    Route::get('/{token?}', ['as' => 'account.reset.password', 'uses' => 'Account\ResetPasswordController@reset']);
    Route::post('/{token}', ['as' => 'account.reset.password.post', 'uses' => 'Account\ResetPasswordController@resetPost']);
});

Route::group(['prefix' => 'email-confirmar'], function() {
    Route::get('/{token?}', ['as' => 'account.email.confirm', 'uses' => 'Account\EmailConfirmController@confirm']);
    Route::post('/{token}', ['as' => 'account.email.confirm.post', 'uses' => 'Account\EmailConfirmController@confirmPost']);
});

Route::get('convite-aceitar', ['as' => 'account.invitation.accept', 'uses' => 'Account\InvitationController@accept']);
Route::get('convite-recusar', ['as' => 'account.invitation.refused', 'uses' => 'Account\InvitationController@refused']);
