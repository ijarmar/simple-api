<?php
    
namespace Api\Controllers;

use \Api\Config\Core;
use \Api\Providers\Authenticatable;
use \Api\Providers\Auth;
use \Api\Utils\URL;
use \Api\Utils\Curl;

class Book implements Authenticatable {
    private string $token;

    public function __construct() {
        $authHeader = getallheaders()['Authorization'];

        if (isset($authHeader) && strstr($authHeader, 'Bearer ')) {
            $this->token = str_replace('Bearer ', '', $authHeader);
        }
    }

    public function get() : void {
        if (!$this->isAuthenticated()) {
            http_response_code(403);
            echo json_encode(['error' => 'Not Authenticated. Authentication token is invalid or expired']);
            return;
        }

        $params = URL::getQueryParams($_SERVER['REQUEST_URI']);
        $params['format']  = 'json';

        $response = Curl::get('http://openlibrary.org/api/books', $params);

        http_response_code($response['code']);
        echo $response['body'];
    }

    public function isAuthenticated() : bool {
        if (isset($this->token)) {
            return Auth::isTokenValid($this->token);
        }
        return false;
    }
}

?>