<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2ec50114c85b1cac50dd512afac68f12
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'muyomu\\log4p\\' => 13,
            'muyomu\\inject\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'muyomu\\log4p\\' => 
        array (
            0 => __DIR__ . '/..' . '/muyomu/log4p/src',
        ),
        'muyomu\\inject\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2ec50114c85b1cac50dd512afac68f12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2ec50114c85b1cac50dd512afac68f12::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2ec50114c85b1cac50dd512afac68f12::$classMap;

        }, null, ClassLoader::class);
    }
}
