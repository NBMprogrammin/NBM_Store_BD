<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
    
    'allowed_methods' => ['*'],
    // https://your-frontend-domain.com
    'allowed_origins' => ['http://localhost:5173', 'https://noururstart25t.github.io'],
    
    'allowed_headers' => ['*'],
    
    'exposed_headers' => [],
    
    'max_age' => 0,
    
    'supports_credentials' => true,

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout', 'bss/*'],
    
    'supports_credentials' => true,
    
];