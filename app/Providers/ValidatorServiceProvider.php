<?php

namespace App\Providers;

use App\Library\Utility;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
			$utility = new Utility();
			$value = $utility->formatNoHyphenPhoneNum($value);
			$pregPhone = "/^[0-9]{1,3}[-ー]?\d[0-9]{2,3}[-ー]?\d[0-9]{2,3}$/";
			return preg_match($pregPhone, $value) ? true : false;
		});
	}
}
