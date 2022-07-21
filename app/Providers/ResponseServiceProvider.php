<?php

namespace App\Providers;

use App\Http\Resources\DataResource;
use Illuminate\Support\ServiceProvider;
use Response;

class ResponseServiceProvider extends ServiceProvider
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
		$headers = [
			'Content-Type' => 'application/json;charset=utf-8',
			'Access-Control-Allow-Origin' => '*',
			'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
		];


		Response::macro('error', function ($message, $code = 404) use ($headers) {
			return response()->json([
				'code'        => $code,
				'success'    => false,
				'status'    => 'error',
				'message'    => $message,
			], $code, $headers, JSON_UNESCAPED_UNICODE);
		});
		Response::macro('validationFailed', function ($errors, $message = 'Correggere i dati inseriti') use ($headers) {
			return response()->json([
				'code'        => 400,
				'success'    => false,
				'status'    => 'error',
				'message'    => $message,
				'errors'    => $errors,
			], 400, $headers, JSON_UNESCAPED_UNICODE);
		});
		Response::macro('model', function ($model, $message = '', $additional = []) use ($headers) {
			$additional['code'] = 200;

			return (new DataResource($model))->additional($additional);
		});
		Response::macro('success', function ($data = [], $message = '', $code = 200)  use ($headers) {
			if (is_string($data)) {
				$data = ['message' => $data, 'data' => []];
			} else {
				$data = compact('data');
			}
			$response = array_merge(['code' => 200, 'status' => 'success', 'success' => true,], $data);
			return response()->json($response, $code, $headers, JSON_UNESCAPED_UNICODE);
		});
	}
}
