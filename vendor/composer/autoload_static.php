<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit299ef3067aeb6b21074d6c2abc3b9a18
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Utils\\' => 6,
        ),
        'O' => 
        array (
            'Options\\' => 8,
        ),
        'M' => 
        array (
            'Modules\\' => 8,
        ),
        'I' => 
        array (
            'Inc\\' => 4,
        ),
        'A' => 
        array (
            'Add\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Utils\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/utilities',
        ),
        'Options\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/addons/options',
        ),
        'Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/addons/modules',
        ),
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Add\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/addons',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit299ef3067aeb6b21074d6c2abc3b9a18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit299ef3067aeb6b21074d6c2abc3b9a18::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
