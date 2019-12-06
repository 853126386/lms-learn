<?php

namespace Aaronlee\LaravelShop\Wap\Extend\Make;


use Illuminate\Routing\Console\ControllerMakeCommand as Command ;
use Symfony\Component\Console\Input\InputArgument;

class ControllerMakeCommand extends Command
{
    use GeneratorCommand;

    protected $name = 'shop-make:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller class';

    protected function getDefaultNamespace($rootNamespace)
    {
//        var_dump($this->getPackageInput().'/Http/Controllers/');exit;
        return $this->getPackageInput().'/Http/Controllers/';
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getPackageInput()
    {
        return trim($this->argument('package'));
    }

    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The name of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

}
