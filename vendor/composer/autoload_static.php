<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61ccf21f85e9f3b51f78e9e6bf8de2f6
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61ccf21f85e9f3b51f78e9e6bf8de2f6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61ccf21f85e9f3b51f78e9e6bf8de2f6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61ccf21f85e9f3b51f78e9e6bf8de2f6::$classMap;

        }, null, ClassLoader::class);
    }
}