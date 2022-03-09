<?php 

namespace Amal\Generator;

use Amal\Generator\Console\GeneratorCommand;
use Illuminate\Support\ServiceProvider;
use Amal\Generator\Service\GeneratorService;

class GeneratorServiceProvider extends ServiceProvider
{
	public function register()
	{
		  $this->app->bind('GeneratorService', function($app) {
    		  return new GeneratorService();
  		  });
	}
	public function boot()
	{
        if($this->app->runningInConsole()){
        	$this->commands([
        		GeneratorCommand::class,
        	]);
        }
    }
}