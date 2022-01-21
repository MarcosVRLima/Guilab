<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac7e213ebb3d854e3fd41ffbf6c9de8e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac7e213ebb3d854e3fd41ffbf6c9de8e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac7e213ebb3d854e3fd41ffbf6c9de8e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitac7e213ebb3d854e3fd41ffbf6c9de8e::$classMap;

        }, null, ClassLoader::class);
    }
}