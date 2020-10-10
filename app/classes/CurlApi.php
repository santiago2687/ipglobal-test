<?php

namespace App\classes;

use InvalidArgumentException;

class CurlApi
{

    public function CurlRequest($url)
    {   
        if ($url == NULL) throw new InvalidArgumentException("The fuction not allow NULL values");
        if ($url == "")  throw new InvalidArgumentException("The fuction not allow empty string");
        if (is_numeric($url))  throw new InvalidArgumentException("The fuction not allow numeric values");

        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $body = '{}';

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $movies = curl_exec($ch);

        return $movies;
    }
}
