<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InnController extends Controller
{
	public static function getInnResponce($value)
	{
		$responce = Http::get('https://api-fns.ru/api/egr', [
			'req' => $value,
			'key' => env('FNS_KEY')
		]);

		return $responce->object();
	}
}
