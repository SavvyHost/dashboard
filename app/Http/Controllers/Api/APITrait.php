<?php

namespace App\Http\Controllers\API;

trait APITrait {
	public function sendSuccess($message, $data, $code = 200) {
		return response()->json([
			'message' => $message,
			'data' => $data
		], $code);
	}
	
	public function sendError($message, $data, $code = 400) {
		return response()->json([
			'message' => $message,
			'data' => $data
		], $code);
	}
	
}
