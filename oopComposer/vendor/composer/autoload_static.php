<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc05ed6c939f48e84f2c5bea76b1d5c59
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HotelAbc\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HotelAbc\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc05ed6c939f48e84f2c5bea76b1d5c59::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc05ed6c939f48e84f2c5bea76b1d5c59::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc05ed6c939f48e84f2c5bea76b1d5c59::$classMap;

        }, null, ClassLoader::class);
    }
}
