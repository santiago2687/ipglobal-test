<?php

use App\classes\CurlApi;
use App\classes\Omdb;
use PHPUnit\Framework\TestCase;

Class MovieApiTest extends TestCase {

    private $movieApi;
    private $curlApi;

    public function setup(): void
    {
        $this->movieApi = new Omdb();
        $this->curlApi = new CurlApi();
    }


    /*-------------------Tests getting Movies-------------------------*/

    public function testGetMoviesBySimpleName() {
        $this->assertIsString($this->movieApi->getMoviesByName("narnia"));
    }

    public function testGetMoviesByComplexName() {
        $this->assertIsString($this->movieApi->getMoviesByName("james bond"));
    }

    public function testGetMoviesByEmptyString() {
        $this->expectException(InvalidArgumentException::class);
        $this->movieApi->getMoviesByName("");
    }

    public function testGetMoviesByNumberParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->movieApi->getMoviesByName(1);
    }

    public function testGetMoviesByNullParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->movieApi->getMoviesByName(NULL);
    }

    /*-------------------Tests getting Info Movie-------------------------*/

    public function testGetMovieByIdString() {
        $this->assertIsString($this->movieApi->getMoviesById("tt0363771"));
    }

    public function testGetMovieByIdEmptyString() {
        $this->expectException(InvalidArgumentException::class);
        $this->assertIsString($this->movieApi->getMoviesById(""));
    }

    public function testGetMovieByIdNumberParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->movieApi->getMoviesById(1);
    }

    public function testGetMovieByIdNullParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->movieApi->getMoviesById(NULL);
    }

    /*-------------------Tests Curl Request-------------------------*/

    public function testGetMovieByValidUrl() {
        $this->assertIsString($this->curlApi->CurlRequest("http://www.omdbapi.com/?apikey=6033f52&s=james+bond"));
    }

    public function testCurlRequestByUrlNullParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->curlApi->CurlRequest(NULL);
    }

    public function testCurlRequestByUrlNumericParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->curlApi->CurlRequest(1);
    }

    public function testCurlRequestByUrlEmptyStringParameters() {
        $this->expectException(InvalidArgumentException::class);
        $this->curlApi->CurlRequest("");
    }

}