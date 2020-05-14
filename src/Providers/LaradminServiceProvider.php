<?php

namespace Webzera\Lararoleadmin\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LararoleadminServiceProvider extends ServiceProvider
{
	public function boot()
	{
		Schema::defaultStringLength(191);

		$this->loadRoutesFrom(__DIR__. '/./../routes/web.php');
		$this->loadViewsFrom(__DIR__. '/./../../resources/views', 'admin');
	}

	public function register()
	{
		$this->registerPublishables();
	}
	private function registerPublishables()
	{
		$bashPath = dirname(__DIR__,2);

		$arrPublishable = [
			'seeds' => [
				"$bashPath/publishable/database/seeds" => database_path('seeds'),
			],
			'migrations' => [
				"$bashPath/publishable/database/migrations" => database_path('migrations'),
			],
			'config' => [
				"$bashPath/publishable/config/lararoleadmin.php" => config_path('lararoleadmin.php') 
			],
			'middleware' => [
				"$bashPath/publishable/middleware/CheckRole.php" => app_path('Http/Middleware/CheckRole.php') 
			],
			'controller' => [
				"$bashPath/publishable/Controllers/AdminController.php" => app_path('Http/Controllers/AdminController.php') 
			],
			'views' => [
				"$bashPath/publishable/views" => resource_path('views/admin'),			
			],
			'notification' => [
				"$bashPath/publishable/Notification" => app_path('Http/Notifications'),			
			],
			'public' => [
				"$bashPath/publishable/public/vendor/lararoleadmin" => public_path('vendor/lararoleadmin') 
			]
		];

		foreach ($arrPublishable as $group => $paths) {
			$this->publishes($paths, $group);
		}
	}
}