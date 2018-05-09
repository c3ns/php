<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba03ff4d7a9300f6f0ee3f6a24df74d6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba03ff4d7a9300f6f0ee3f6a24df74d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba03ff4d7a9300f6f0ee3f6a24df74d6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
