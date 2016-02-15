<?php

namespace BhargavJoshi\Ping;

class PingUrl
{
    public function ping($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (200==$statusCode) {
            return true;
        }
        return false;
    }

}