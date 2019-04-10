<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'roles' => 'c,r,u,d'
        ],
        'librarian' => [
            'students' => 'c,r,u,d',
            'books' => 'c,r,u,d',
        ],
        'library_prefect' => [
            'books' => 'c,r,u,d',
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
