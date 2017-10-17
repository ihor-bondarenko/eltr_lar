<?php

return [
    'role_structure' => [
        'administrator' => [
            'trainer' => 'c,r,u,d',
            'viewer' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'trainer' => [
            'trainer' => 'c,r,u,d'
        ],
        'viewer' => [
            'viewer' => 'c,r,u,d'
        ]
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
