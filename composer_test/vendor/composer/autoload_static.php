<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite8a57e25acb1d17ec30167af6e11c9fb
{
    public static $files = array (
        '9b552a3cc426e3287cc811caefa3cf53' => __DIR__ . '/..' . '/topthink/think-helper/src/helper.php',
        '35fab96057f1bf5e7aba31a8a6d5fdde' => __DIR__ . '/..' . '/topthink/think-orm/stubs/load_stubs.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\redis\\' => 12,
            'think\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
            'Psr\\Cache\\' => 10,
            'Predis\\' => 7,
        ),
        'L' => 
        array (
            'League\\MimeTypeDetection\\' => 25,
            'League\\Flysystem\\Cached\\' => 24,
            'League\\Flysystem\\' => 17,
        ),
        'G' => 
        array (
            'GIFEndec\\Tests\\' => 15,
            'GIFEndec\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\redis\\' => 
        array (
            0 => __DIR__ . '/..' . '/kain/think-redis/src',
        ),
        'think\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/framework/src/think',
            1 => __DIR__ . '/..' . '/topthink/think-helper/src',
            2 => __DIR__ . '/..' . '/topthink/think-orm/src',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
        'League\\MimeTypeDetection\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/mime-type-detection/src',
        ),
        'League\\Flysystem\\Cached\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-cached-adapter/src',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
        'GIFEndec\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/stil/gif-endec/tests',
        ),
        'GIFEndec\\' => 
        array (
            0 => __DIR__ . '/..' . '/stil/gif-endec/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite8a57e25acb1d17ec30167af6e11c9fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite8a57e25acb1d17ec30167af6e11c9fb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite8a57e25acb1d17ec30167af6e11c9fb::$classMap;

        }, null, ClassLoader::class);
    }
}
