<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f263139d28afb4a8ed5cd8d6de3b25b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8f263139d28afb4a8ed5cd8d6de3b25b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8f263139d28afb4a8ed5cd8d6de3b25b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}