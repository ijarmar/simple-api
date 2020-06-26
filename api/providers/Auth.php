<?php

namespace Api\Providers;

use \Api\Config\Core;
use \Firebase\JWT\JWT;

class Auth {
    public static function isTokenValid(string $token) : bool {
        try {
            $decoded = JWT::decode($token, Core::getSecret(), ['HS256']);
            return isset($decoded);
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function generateToken(array $payload) : string {
        try {
            return JWT::encode($payload, Core::getSecret());
        } catch (\Exception $e) {
            return '';
        }
    }
}

?>