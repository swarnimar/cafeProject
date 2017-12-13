<?php 
use Cake\Core\Configure;

return [
    'HybridAuth' => [
        'providers' => [
            // 'Google' => [
            //     'enabled' => true,
            //     'keys' => [
            //         'id' => '<google-client-id>',
            //         'secret' => '<secret-key>'
            //     ]
            // ],
            'Facebook' => [
                'enabled' => true,
                'keys' => [
                    'id' => Configure::read('social.fbApiKey'),
                    'secret' => Configure::read('social.fbApiSecret')
                ],
                'scope' => 'email, user_about_me, user_birthday, user_hometown'
            ],
            // 'Twitter' => [
            //     'enabled' => true,
            //     'keys' => [
            //         'key' => '<twitter-key>',
            //         'secret' => '<twitter-secret>'
            //     ],
            //     'includeEmail' => true // Only if your app is whitelisted by Twitter Support
            // ]
        ],
        'debug_mode' => Configure::read('debug'),
        'debug_file' => LOGS . 'hybridauth.log',
        // 'hauth_return_to' => '/users/socialLogin'
    ]
];
?>