<?php

namespace App\classes;

use App\classes\CurlApi;
use InvalidArgumentException;

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
        if ($id == NULL) throw new InvalidArgumentException("The fuction not allow NULL values");
        if ($id == "")  throw new InvalidArgumentException("The fuction not allow empty string");
        if (is_numeric($id))  throw new InvalidArgumentException("The fuction not allow numeric values");

        $id = "i=" . $id;
        $finalUrl = $this->apiOmdbUrl . $id;
        $requestCurl = new CurlApi();
        $request =  $requestCurl->CurlRequest($finalUrl);
        return $request;
    }

    //Search Movie by name tag
    public function getMoviesByName($name)
    {
        if ($name == NULL) throw new InvalidArgumentException("The fuction not allow NULL values");
        if ($name == "")  throw new InvalidArgumentException("The fuction not allow empty string");
        if (is_numeric($name))  throw new InvalidArgumentException("The fuction not allow numeric values");

        $name = "s=" . $name;
        $finalUrl = $this->apiOmdbUrl . $name;
        $requestCurl = new CurlApi();
        $request =  $requestCurl->CurlRequest($finalUrl);
        return $request;
    }
}
