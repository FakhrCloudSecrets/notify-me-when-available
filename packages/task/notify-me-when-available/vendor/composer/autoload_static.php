<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37ef94896c8f6ac1171e9c9cb07247e1
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cs\\NotifyMeWhenAvailable\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cs\\NotifyMeWhenAvailable\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit37ef94896c8f6ac1171e9c9cb07247e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37ef94896c8f6ac1171e9c9cb07247e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit37ef94896c8f6ac1171e9c9cb07247e1::$classMap;

        }, null, ClassLoader::class);
    }
}
