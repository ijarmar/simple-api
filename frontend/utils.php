<?php 

class Utils {
    public static function get(string $url, array $params = [], array $headers = []) : array {
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
            if (!empty($headers)) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            }
    
            if (!empty($params)) {
                $url .= '?';
                foreach($params as $name => $value) {
                    $url .= "$name=$value&";
                }
            }
    
            curl_setopt($ch, CURLOPT_URL, $url);
    
            $body = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
            curl_close($ch);
    
            return ['code' => $httpCode, 'body' => $body];
    }
}