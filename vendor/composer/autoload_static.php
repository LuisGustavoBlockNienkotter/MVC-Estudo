<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19f2ae0127fd007cd510079a82a4f7fe
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DTO\\' => 4,
            'DAO\\' => 4,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
        'B' => 
        array (
            'BO\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DTO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/dto',
        ),
        'DAO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/dao',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
        'BO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/bo',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19f2ae0127fd007cd510079a82a4f7fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19f2ae0127fd007cd510079a82a4f7fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
