<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit504706b3436bfb88b3bec04d24cc347d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Model\\' => 10,
            'App\\Exception\\' => 14,
            'App\\Core\\' => 9,
            'App\\Controller\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'App\\Exception\\' => 
        array (
            0 => __DIR__ . '/../..' . '/exceptions',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit504706b3436bfb88b3bec04d24cc347d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit504706b3436bfb88b3bec04d24cc347d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit504706b3436bfb88b3bec04d24cc347d::$classMap;

        }, null, ClassLoader::class);
    }
}
