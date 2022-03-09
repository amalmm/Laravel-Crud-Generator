<?php

namespace Amal\Generator\Console;

use Illuminate\Console\Command;

use Amal\Generator\Facade\Generator;

class GeneratorCommand extends Command
{
    protected $signature = 'generator:new {name}';

    protected $description = 'create new crud ';

    public function handle()
    {
        $name = $this->argument('name');

        Generator::MakeModel($name);
        Generator::MakeController($name);
        Generator::MakeRequest($name);
        Generator::MakeMigration($name);
        Generator::MakeRepository($name);
        Generator::MakeEloquent($name);
        Generator::MakeFactory($name);
        
        $this->info($name.' created successfully');

    }
}