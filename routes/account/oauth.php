<?php

/** OAuth 2.0 **/
Route::group(['prefix' => 'autenticar'], function() {
    /** OAuth 2.0 **/
    Route::get('facebook', ['as' => 'account.oauth.authenticate.facebook', 'uses' => 'Account\OAuth\FacebookController@authenticate']);
    Route::get('google', ['as' => 'account.oauth.authenticate.google', 'uses' => 'Account\OAuth\GoogleController@authenticate']);
    Route::get('twitter', ['as' => 'account.oauth.authenticate.twitter', 'uses' => 'Account\OAuth\TwitterController@authenticate']);

});

Route::group(['prefix' => 'registrar'], function() {
    /** OAuth 2.0 **/
    Route::get('facebook', ['as' => 'account.oauth.register.facebook', 'uses' => 'Account\OAuth\FacebookController@register']);
    Route::get('google', ['as' => 'account.oauth.register.google', 'uses' => 'Account\OAuth\GoogleController@register']);
    Route::get('twitter', ['as' => 'account.oauth.register.twitter', 'uses' => 'Account\OAuth\TwitterController@register']);

});
