<?php

namespace Api;

date_default_timezone_set ('Europe/Helsinki');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('vendor/autoload.php');

use \Api\Controllers\Auth;
use \Api\Controllers\Movie;
use \Api\Controllers\Book;

switch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
	case '/auth':
		$controller = new Auth();
		$controller->getToken();
		break;
	case '/getMovie':
		$controller = new Movie();
		$controller->get();
		break;
	case '/getBook':
		$controller = new Book();
		$controller->get();
		break;
	default:
		http_response_code(404);
}

?>
