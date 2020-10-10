<?php

namespace App\classes;

use App\classes\CurlApi;

class Omdb
{

    private $apiOmdbUrl;

    function __construct()
    {
        $this->apiOmdbUrl = "http://www.omdbapi.com/?apikey=6033f52&";
    }

    //Search Movie by Id
    public function getMoviesById($id)
    {
        if ($id != null && $id != "") {
            $id = "i=" . $id;
            $finalUrl = $this->apiOmdbUrl . $id;
            $requestCurl = new CurlApi();
            $request =  $requestCurl->CurlRequest($finalUrl);
            return $request;
        }
    }

    //Search Movie by name tag
    public function getMoviesByName($name)
    {
        if ($name != null && $name != "") {
            $name = "s=" . $name;
            $finalUrl = $this->apiOmdbUrl . $name;
            $requestCurl = new CurlApi();
            $request =  $requestCurl->CurlRequest($finalUrl);
            return $request;
        }
    }
}
