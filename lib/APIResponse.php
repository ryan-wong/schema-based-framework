<?php namespace lib;

class APIResponse {
	public static $VALIDATION_ERROR = 1;
	public static $NOT_FOUND_ERROR = 2;
	public static $SUCCESS = 0;
	public static $API_MOVED = 3;
	public static $NOT_MODIFIED = 4;
	public static $TEMPORARY_REDIRECT = 5;
	public static $UNAUTHORIZED = 6;
	public static $TOO_LARGE = 7;
	public static $TOO_MANY_REQUEST = 8;
	public static $INTERNAL_ERROR = 9;
	public static $NOT_IMPLEMENTED = 10;
	public static $NOT_AVAILABLE = 11;

	public static function response404 ($code, $resource) {
		return json_encode([
            'status' => 404,
            'name' => 'Not Found Exception',
            'message' => $resource . ' was not found',
            'code' => $code
        ]);
	}

	public static function response401 () {
		return json_encode([
            'status' => 401,
            'name' => 'Unauthorized Access',
            'message' => 'Unauthorized Access',
            'code' => self::$UNAUTHORIZED
        ]);
	}

	public static function response413 () {
		return json_encode([
            'status' => 413,
            'name' => 'Request Entity Too Large',
            'message' => 'The requested entity is too large',
            'code' => self::$TOO_LARGE
        ]);
	}

	public static function response500 () {
		return json_encode([
            'status' => 500,
            'name' => 'Internal Server Error',
            'message' => 'Error due to internal error',
            'code' => self::$INTERNAL_ERROR
        ]);
	}

	public static function response503 () {
		return json_encode([
            'status' => 503,
            'name' => 'Service Not Available',
            'message' => 'The API server is not ready to accept requests',
            'code' => self::$NOT_AVAILABLE
        ]);
	}

	public static function response501 () {
		return json_encode([
            'status' => 501,
            'name' => 'Not Implemented',
            'message' => 'API not implemented',
            'code' => self::$NOT_IMPLEMENTED
        ]);
	}

	public static function response429 () {
		return json_encode([
            'status' => 429,
            'name' => 'Too Many Request',
            'message' => 'Too many request in given time span',
            'code' => self::$TOO_MANY_REQUEST
        ]);
	}
	
    public static function response400 ($code, $message) {
		return json_encode([
            'status' => 400,
            'name' => 'Bad Request',
            'message' => $message,
            'code' => $code
        ]);
	}

    public static function response402 ($code, $message) {
		return json_encode([
            'status' => 402,
            'name' => 'Payment Required',
            'message' => $message,
            'code' => $code
        ]);
	}

    public static function response409 ($code, $message) {
		return json_encode([
            'status' => 409,
            'name' => 'Conflict',
            'message' => $message,
            'code' => $code
        ]);
	}

    public static function response403 ($code, $message) {
		return json_encode([
            'status' => 403,
            'name' => 'Forbidden',
            'message' => $message,
            'code' => $code
        ]);
	}

	public static function response422 ($code, $errors) {
		return json_encode([
            'name' => 'Validation Exception',
            'message' => 'There was validation errors',
            'code' => $code,
            'status' => 422,
            'errors' => $errors
        ]);
	}

	public static function response301 () {
		return json_encode([
            'name' => 'API Moved Permanently',
            'message' => 'The API invoked is moved permanently',
            'code' => self::$API_MOVED,
            'status' => 301
        ]);
	}

	public static function response307 ($redirect) {
		return json_encode([
            'name' => 'Temporary Redirect',
            'message' => 'Resend your request to new API',
            'code' => self::$TEMPORARY_REDIRECT,
            'status' => 307,
            'url' => $redirect
        ]);
	}

	public static function response304 ($data) {
		return json_encode([
            'name' => 'Data Not Modified',
            'message' => 'Data not modified',
            'code' => self::$NOT_MODIFIED,
            'status' => 304
        ]);
	}

	public static function response200 ($data) {
		return json_encode([
            'code' => self::$SUCCESS,
            'status' => 200,
            'data' => $data
        ]);
	}

	public static function paginateResponse200 ($data, $page, $numPages, $numItems, $itemPerPage, $query = '') {
		return json_encode([
            'code' => self::$SUCCESS,
            'status' => 200,
            'data' => [
                'query' => $query,
                'totalItems' => $numItems,
                'itemsPerPage' => $itemPerPage,
                'page' => $page,
                'numPages' => $numPages,
                'nextLink' => '',
                'previousLink' => '',
                'items' => $data
            ]
        ]);
	}        
}