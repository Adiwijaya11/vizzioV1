<?php

return [
    'super_admin' => [
        'name' => env('SUPERADMIN_NAME', 'Super Admin VizzioCraft'),
        'email' => env('SUPERADMIN_EMAIL', 'superadmin@vizziocraft.com'),
        'password' => env('SUPERADMIN_PASSWORD'),
    ],
    'admin' => [
        'name' => env('ADMIN_NAME', 'Admin VizzioCraft'),
        'email' => env('ADMIN_EMAIL', 'admin@vizziocraft.com'),
        'password' => env('ADMIN_PASSWORD'),
    ],
];

