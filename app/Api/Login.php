<?php

namespace App\Api;

use App\User;
use App\Helpers\HttpClient;

class Login
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

    public function loginCommander(string $url, array $params = []){
      $res = $this->http->post($url, $params);
      return $res;
    }
}
