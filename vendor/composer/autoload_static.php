<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit77683524ae32f8f422a967120174e7eb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit77683524ae32f8f422a967120174e7eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit77683524ae32f8f422a967120174e7eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit77683524ae32f8f422a967120174e7eb::$classMap;

        }, null, ClassLoader::class);
    }
}
