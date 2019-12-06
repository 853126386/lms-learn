<?php

namespace Aaronlee\LaravelShop\Wap\Extend\Make;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
trait GeneratorCommand
{

    protected $packagepath=__DIR__.'/../../'; //组件根路径

    protected function rootNamespace()
    {
        return "Aaronlee\LaravelShop\Wap";
    }


    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        $res=$this->packagepath.'/'.str_replace('\\', '/', $name).'.php';
        return $res;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */

}
