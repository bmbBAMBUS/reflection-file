<?php

return [
	'auth_endpoint'       => env( 'PORTAL_AUTH_ENDPOINT', '172.17.0.1/api/auth/token/check/' ),
	'expiration'          => null,
	'main_appliance'      => 'd9f605f0-0669-4d05-8845-e4517acb6557',
	'user_model'          => env( 'PORTAL_USER_MODEL', 'App\Models\User' ),
	'db_user_fields'      => [
		'id'            => 'id',
        'email'         => 'email',
        'phone'         => 'phone',
        'phone_country' => 'phone_country',
        'phone_prefix'  => 'phone_prefix',
        'title'         => 'title',
		'firstname'     => 'first_name',
        'lastname'     =>  'last_name',
        'workspace'     => 'workspace_id',
	],
	'user_model_key'      => 'id',
	'user_model_key_type' => 'string',

	'service'         => [
		'auth'  => [
			'url'        => env('SERVICE_AUTH_URL','http://172.17.0.1'),
			'public_key' => base_path( 'keys/auth.key' ),
		],
		'media' => [
			'url'        => env('SERVICE_MEDIA_URL','http://172.17.0.1:8002'),
			'public_key' => base_path( 'keys/media.key' ),
		],
		'mbc'   => [
			'url'        => env('SERVICE_MBC_URL','http://172.17.0.1:8001'),
			'public_key' => base_path( 'keys/mbc.key' ),
		],
		'link'   => [
			'url'        => env('SERVICE_LINK_URL','http://172.17.0.1:8003'),
			'public_key' => base_path( 'keys/link.key' ),
		],
        'campaign' => [
            'url'        => env('SERVICE_CAMPAIGN_URL','http://172.17.0.1:8005'),
            'public_key' => base_path( 'keys/campaign.key' ),
        ],
        'notification' => [
            'url'        => env('SERVICE_NOTIFICATION_URL','http://172.17.0.1:8008'),
            'public_key' => base_path( 'keys/notification.key' ),
        ]
	],


	'current_service' => env('SERVICE_NAME','service_name'), //change this to service name ex. auth , media or mbc for exception
	'private_key'     => base_path( 'keys/private.key' ),
	'pass_key'        => env('SERVICE_PASS_KEY','123456'),
	'ttl'             => env('SERVICE_TOKEN_TTL',3600),

];
