<?php

namespace AaronLee\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'wap-member:install'; //安装命令

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the member package';  //命令描述

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *要执行的命令
     * @return void
     */
    public function handle()
    {
        $this->call('migrate');
        $this->call('vendor:publish',['--provider'=>'AaronLee\LaravelShop\Wap\Member\Providers\MemberServiceProvider']);
    }
}
