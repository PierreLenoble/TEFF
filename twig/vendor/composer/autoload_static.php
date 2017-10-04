<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe69452c06f48f6777e6f7171af3c89e
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe69452c06f48f6777e6f7171af3c89e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe69452c06f48f6777e6f7171af3c89e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitfe69452c06f48f6777e6f7171af3c89e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}