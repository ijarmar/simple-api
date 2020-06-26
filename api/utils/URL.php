<?php

namespace Api\Utils;

class URL {
    public static function getQueryParams(string $url) : array {
        $urlItems = parse_url($url);
        parse_str($urlItems['query'], $params);

        if (isset($params)) {
            return $params;
        }
        return [];
    }
}

?>