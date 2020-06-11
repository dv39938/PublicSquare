<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb52b4aa6cdeb531d8187a385387d377
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'SquareConnect\\' => 14,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'SquareConnect\\' => 
        array (
            0 => __DIR__ . '/..' . '/square/connect/lib',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb52b4aa6cdeb531d8187a385387d377::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb52b4aa6cdeb531d8187a385387d377::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}