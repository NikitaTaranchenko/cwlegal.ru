<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackEndServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
            'Acme\Repositories\TokenRepositoryInterface',
            'Acme\Repositories\TokenEloquentRepository'
        );
	}

}
