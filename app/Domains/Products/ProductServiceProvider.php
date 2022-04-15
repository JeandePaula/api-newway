<?php

namespace App\Domains\Products;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
	protected $namespace = 'App\\Domains\\Products\\Http\\Controllers';

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
