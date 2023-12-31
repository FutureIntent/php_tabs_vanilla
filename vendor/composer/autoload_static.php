<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3299d1aa787b4280b6fd7ee0b1bbc557
{
    public static $prefixLengthsPsr4 = array (
        'r' => 
        array (
            'root\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'root\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3299d1aa787b4280b6fd7ee0b1bbc557::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3299d1aa787b4280b6fd7ee0b1bbc557::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3299d1aa787b4280b6fd7ee0b1bbc557::$classMap;

        }, null, ClassLoader::class);
    }
}
