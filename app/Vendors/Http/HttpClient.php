<?php

namespace App\Vendors\Http;

use \GuzzleHttp\Client as Http;

class HttpClient
{
    /**
     * The Http client implementation.
     */
    protected $http;

    /**
     * Create a http client.
     *
     * @param  GuzzleHttp  $http
     * @return void
     */
    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    public function post(string $url, array $params = []){
      try{
          $res = $this->http->request('POST', $url, $params);
          $bodyContent = $res->getBody()->getContents();
          return $bodyContent;
      }catch(Exception $e){}
      return [];
    }
    public function get(){}
    public function delete(){}
    public function put(){}
    public function request(){}
}
