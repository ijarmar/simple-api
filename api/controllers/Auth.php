<?php

namespace Api\Controllers;

class Auth {
    public static function getToken() : void {
        $token = \Api\Providers\Auth::generateToken(['jti' => uniqid(), 'iat' => time(), 'exp' => time() + 3600 ]);

        if (isset($token)) {
            http_response_code(200);
            echo json_encode(['token' => $token]);
            return;
        }

        http_response_code(500);
        echo json_encode(['error' => 'Something went wrong, try again later']);
    }
}

?>