<?php

use OAuth\Common\Storage\Session;

return [

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    //'storage' => new Session(),

    /**
     * Consumers
     */
    'consumers' => [

        /**
         * Facebook
         * https://developers.facebook.com/apps/
         */

         /*
         'Facebook' => [
             'client_id'     => '150644938745548',
             'client_secret' => 'e4cc119f542c77db04e0b378fee6f971',
             'scope'         => ['email','public_profile','user_friends'],
         ],
         */

        'Facebook' => [
            'client_id'     => '150646165412092',
            'client_secret' => '7c5d16b0bde223e72e36731b0c218c88',
            'scope'         => ['email','public_profile','user_friends'],
        ],

        /**
         * Google
         * https://console.developers.google.com/apis/dashboard
         */

        'Google' => [
            'client_id'     => '254283772588-it19gd4itg6vtobr430bc13o1nnu6uh5.apps.googleusercontent.com',
            'client_secret' => 'VQDSXzqdAW-y4tX_ShCDYe5Y',
            'scope'         => ['userinfo_email', 'userinfo_profile'],
        ],

        /**
         * Twitter
         * https://apps.twitter.com/
         */
         'Twitter' => [
            'client_id'     => 'BB07yeGHE2XDgQVHT9laXDfGe',
            'client_secret' => 'g8jzMA3j8prIkiZTKVNPb1MsC3voR9Ow9A4OMErepajsj0dMWp',
            // No scope - oauth1 doesn't need scope
        ],

    ]

];
