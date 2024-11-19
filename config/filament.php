<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path Admin Filament
    |--------------------------------------------------------------------------
    |
    | URL path untuk dashboard admin Filament. Anda dapat mengubahnya jika
    | ingin URL admin menggunakan nama yang berbeda.
    |
    */

    'path' => env('FILAMENT_PATH', 'admin'),// Sesuaikan dengan URL admin yang diakses


    /*
    |--------------------------------------------------------------------------
    | Middleware Filament
    |--------------------------------------------------------------------------
    |
    | Middleware yang digunakan oleh semua halaman Filament. Pastikan Anda
    | menyertakan middleware autentikasi agar akses dashboard terbatas
    | pada admin yang diizinkan.
    |
    */

        'middleware' => [
            'auth' => [
                \Illuminate\Auth\Middleware\Authenticate::class,
            ],
            'base' => [
                \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
        ],




    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk Laravel Echo jika Anda ingin menggunakan websockets
    | untuk notifikasi real-time. Komponen ini opsional.
    |
    */

    'broadcasting' => [
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Disk yang digunakan Filament untuk menyimpan media. Pastikan disk ini
    | didefinisikan di `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

];
