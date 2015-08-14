<?php namespace Ceejayoz\LaravelPhumbor;

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
		$this->publishes([
			__DIR__.'/../../config/config.php' => $this->getConfigPath(),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->isLumen()) {
			$this->app->configure('laravel-phumbor');
		}

		$this->app['phumbor'] = $this->app->share(function($app) {
			$configPath = __DIR__ . '/../../config/config.php';
			$this->mergeConfigFrom($configPath, 'laravel-phumbor');

			return \Thumbor\Url\BuilderFactory::construct(config('laravel-phumbor.server'), config('laravel-phumbor.key'));
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

	private function isLumen()
	{
		return str_contains($this->app->version(), 'Lumen');
	}

	private function getConfigPath()
	{
		if ($this->isLumen()) {
			return base_path('config/laravel-phumbor.php');
		} else {
			return config_path('laravel-phumbor.php');
		}
	}
}
