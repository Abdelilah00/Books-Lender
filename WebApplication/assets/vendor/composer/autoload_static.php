<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31e6bc183bef41bf085f0e681d8d2fb0
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31e6bc183bef41bf085f0e681d8d2fb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31e6bc183bef41bf085f0e681d8d2fb0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
