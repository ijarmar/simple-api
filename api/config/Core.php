<?php

namespace Api\Config;

class Core {
    public static function getSecret() : string {
        return getenv('SECRET');
    }

    public static function getOmdbKey() : string {
        return getenv('OMDBAPIKEY');
    }
}

?>