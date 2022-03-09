<?php

namespace Amal\Generator\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class GeneratorService  
{
	  public function GetStub($types)
    {
        return file_get_contents(__DIR__."/../resources/stubs/{$types}.stub");
    }

	public function MakeModel($name)
	{
	   $template = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->GetStub('Model')
        );
        file_put_contents(app_path("Models/{$name}.php"), $template);
	}

        public function MakeController($name)
    {
       $template = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->GetStub('Controller')
        );
        file_put_contents(app_path("Http/Controllers/{$name}Controller.php"), $template);
    }
    public function MakeRequest($name)
    {
        if (!file_exists(app_path('Http/Requests/'))) {
           mkdir(app_path('Http/Requests'), 0777, true);
        }

       $template = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->GetStub('Request')
        );
        file_put_contents(app_path("Http/Requests/{$name}Request.php"), $template);
    }

    public function MakeMigration($name)
    {
     Artisan::call('make:migration create_'. strtolower( Str::plural($name)).'_table');
    }

    public function MakeFactory($name)
    {
     Artisan::call('make:factory '.$name.'Factory');
    }

     public function MakeRepository($name)
    {
       if (!file_exists(app_path('Repository'))) {
           mkdir(app_path('Repository'), 0777, true);
        }
            if (!file_exists(app_path('Repository/'.$name))) {
           mkdir(app_path('Repository/'.$name), 0777, true);
        }
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->GetStub('Repository')
        );
        file_put_contents(app_path("Repository/{$name}/{$name}Repository.php"), $template);

    }

        public function MakeEloquent($name)
    {
       if (!file_exists(app_path('Repository'))) {
           mkdir(app_path('Repository'), 0777, true);
        }
            if (!file_exists(app_path('Repository/'.$name))) {
           mkdir(app_path('Repository/'.$name), 0777, true);
        }
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->GetStub('Eloquent')
        );
        file_put_contents(app_path("Repository/{$name}/{$name}Eloquent.php"), $template);

    }


}