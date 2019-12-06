<?php

namespace AaronLee\LaravelShop\Wap\Extend\Make;

use  Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Support\Str;
class ClassMakeCommand extends Command
{

    //引用trait类，trait类的方法会覆盖掉父类的方法
    use GeneratorCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop-make:class {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $packagepath=__DIR__.'/../../'; //组件根路径
    /**
     * Execute the console command.
     *
     * @return mixed
     */




    protected function getStub()
    {
        return __DIR__.'/stubs/class.stub';
    }


    /**
     * @return string
     * @命名空间
     */
    protected function rootNamespace()
    {
        return "Aaronlee\LaravelShop\Wap";
    }

    /**
     * @param string $name
     *
     *
     *
     * @return string
     * @重写，生成文件的最终路径
     */
    protected function getPath($name)
    {
         $name = Str::replaceFirst($this->rootNamespace(), '', $name);

         $res=$this->packagepath.'/'.str_replace('\\', '/', $name).'.php';

         return $res;
    }
}
