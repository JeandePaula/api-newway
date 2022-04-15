<?php

namespace App\Domains\Users;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
	protected $namespace = 'App\\Domains\\Users\\Http\\Controllers';

	public function boot()
	{
		$this->app['router']->group(['namespace' => $this->namespace], function ($router)
		{
			require __DIR__ . '/Http/routes.php';
		});

		$this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
		// $this->loadFactoriesFrom(__DIR__ . '/Database/Factories');		

	}
}
