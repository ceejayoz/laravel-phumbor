<?php namespace Ceejayoz\LaravelPhumbor\Facades;

use Illuminate\Support\Facades\Facade;

class Phumbor extends Facade {
	protected static function getFacadeAccessor() {
		return 'phumbor';
	}
}