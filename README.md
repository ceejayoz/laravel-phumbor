Phumbor for Laravel 4
=====================

This Laravel package adds support for [the 99designs PHP interface](https://github.com/99designs/phumbor) to the [globocom Thumbor thumbnail service](https://github.com/globocom/thumbor).

Installation
------------

Simply require the package in your `composer.json` file:

    "ceejayoz/laravel-phumbor": "dev-master"

Run `composer install` to download the package and have the autoloader updated.

Once installed, register the service provider with your Laravel application. Update the `providers` section of `app/config/app.php`:

	'providers' = array(
		// existing providers
		'Ceejayoz\LaravelPhumbor\LaravelPhumborServiceProvider',
	);

and register the facade in the `aliases` section:

	'aliases' => array(
		// existing aliases
		'Phumbor' => 'Ceejayoz\LaravelPhumbor\Facades\Phumbor',
	);

Now, publish the package's config file:

    php artisan config:publish ceejayoz/laravel-phumbor

which will publish the default configuration file to `app/config/packages/ceejayoz/laravel-phumbor/config.php`.

You should modify this file to reflect your Thumbor installation's URL and secret key.

Usage
-----

The `Phumbor` facade exposes the API from [the 99designs PHP interface](https://github.com/99designs/phumbor).

For example:

    Phumbor::url('http://images.example.com/llamas.jpg')
	    ->fitIn(640, 480)
		->addFilter('fill', 'green');

License
-------

Licensed under the MIT license. See <https://github.com/ceejayoz/laravel-phumbor/blob/master/LICENSE>
