<?php
/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

/*
 * Created by (c)danidoble 2023.
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace App\Config;

use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class Blade
{
    /**
     * @var Factory
     */
    public static Factory $blade;

    /**
     * @param $dir
     * @return void
     */
    public static function makeFactory($dir): void
    {
        $filesystem = new Filesystem();

        $compiler = new BladeCompiler($filesystem, $dir . '/resources/cache');

        $viewFinder = new FileViewFinder($filesystem, [$dir . '/resources/views']);

        $resolver = new EngineResolver();
        $resolver->register('php', function () use ($filesystem) {
            return new PhpEngine($filesystem);
        });
        $resolver->register('blade', function () use ($compiler) {
            return new CompilerEngine($compiler);
        });

        $dispatcher = new Dispatcher();

        static::$blade = new Factory($resolver, $viewFinder, $dispatcher);
    }
}