<?php

//http://usman.it/xss-filter-laravel/
//http://stackoverflow.com/questions/14902589/where-do-i-put-laravel-4-helper-functions-that-can-display-flash-messages


class Helper {

	/**
	 * Get JSON Response
	 *
	 * @param boolean true/false
	 * @param string string/array
	 * @param int 200/400 ...
	 * @return JSON response
	 */
	public static function getResponse($error, $response, $code)
	{
		if($error == 'true' && $response instanceof Exception)
			$response = 'Caught Exception: '.$response->getCode().' '.$response->getMessage();
		
		return Response::json(array(
				'error' => $error,
				'response' => $response),
				$code,array(),JSON_PRETTY_PRINT
				)->setCallback(Input::get('callback'));
	}
	
	#
	
	// Strip slashes functions - for preventing sql injection
	public static function strip_slashes($string) { 
		//if(get_magic_quotes_gpc() == 1) {
		// return mysqli_real_escape_string(stripslashes($string));
		//} else {
		//	return mysqli_real_escape_string($string);
		//}
	}

	#	
	
}
