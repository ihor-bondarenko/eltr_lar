<?php

namespace App\Vendors\Api;

use App\User;
use App\Vendors\Http\HttpClient;

class Commander
{
    /**
     * The Http client implementation.
     */
    protected $http;

    /**
     * Create a http client.
     *
     * @param  HttpClient  $http
     * @return void
     */
    public function __construct(HttpClient  $http)
    {
        $this->http = $http;
    }

    public function login(string $url, array $params = [])
    {
      $res = $this->http->post($url, $params);
      return $res;
    }
}
