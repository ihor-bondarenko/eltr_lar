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
          $params['allow_redirects'] = [
            'max'             => 3,        // allow at most 10 redirects.
            'strict'          => true,      // use "strict" RFC compliant redirects.
            'referer'         => true,      // add a Referer header
            'track_redirects' => true
          ];
          $res = $this->http->request('POST', $url, $params);
          $bodyContent = $res->getBody()->getContents();
          return [
            'content' => $bodyContent,
            'code' => $res->getStatusCode()
           ];
      }catch(RequestException $e){
        if ($e->hasResponse()) {
          return $e->getResponse();
        }
        return [];
      }
    }
    public function get(){}
    public function delete(){}
    public function put(){}
    public function request(){}
}
