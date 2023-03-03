<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a8a5a139a24f19263317de25e79ae70
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Admin\\Phporientadoaobjetos\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Admin\\Phporientadoaobjetos\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a8a5a139a24f19263317de25e79ae70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a8a5a139a24f19263317de25e79ae70::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a8a5a139a24f19263317de25e79ae70::$classMap;

        }, null, ClassLoader::class);
    }
}
