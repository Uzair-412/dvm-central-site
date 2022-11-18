<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'file-manager' => [ // creating new one for file manager to avoid any conflicts
            'driver' => 'local',
            'root' => public_path('up_data/editor'),
            'url' => env('APP_URL').'up_data/editor',
            'visibility' => 'public',
        ],

        'ds3' => [ // creating new one for file manager to avoid any conflicts
            'driver' => 'local',
            'root' => public_path('up_data'),
            'url' => env('APP_URL').'/up_data',
            'visibility' => 'public',
        ],

        // 'ds3' => [
        //     'driver' => 's3',
        //     'key' => env('AWS_ACCESS_KEY_ID', '6GBXLID2ZDXFPQOXH4T5'),
        //     'secret' => env('AWS_SECRET_ACCESS_KEY', 'on0a8Qd+fZ/r+vIXDjb2YnO+04OTpiIaRRkHbb7VZVI'),
        //     'region' => env('AWS_DEFAULT_REGION', 'nyc3'),
        //     'bucket' => env('AWS_BUCKET', 'vpc-assets'),
        //     'url' => env('AWS_URL', 'https://vpc-assets.nyc3.digitaloceanspaces.com'),
        //     'endpoint' => env('AWS_ENDPOINT', 'https://nyc3.digitaloceanspaces.com'),
        //     'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        //     'visibility' => 'public',
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
