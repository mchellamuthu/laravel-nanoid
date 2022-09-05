<?php

return [
    'size' => env('NANO_ID_SIZE', 12),
    'prefix' => env('NANO_ID_PREFIX', null),
    'seperator' => env('NANO_ID_SEPERATOR', "_"),
    "enable_timestamp" => env('NANO_ID_ENABLE_TIMESTAMP', false)
];
