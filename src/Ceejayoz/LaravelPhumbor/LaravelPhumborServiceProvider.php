<?php namespace Ceejayoz\LaravelPhumbor;

use Config;
use Illuminate\Support\ServiceProvider;

class LaravelPhumborServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ceejayoz/laravel-phumbor');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['phumbor'] = $this->app->share(function($app) {
			return \Thumbor\Url\BuilderFactory::construct(Config::get('laravel-phumbor::server'), Config::get('laravel-phumbor::key'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}