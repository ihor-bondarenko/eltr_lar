<?php

namespace App\Vendors\Http;

use \GuzzleHttp\Client as Http;
use \Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Handler\CurlHandler;
use \GuzzleHttp\Promise;

class HttpClient
{
    /**
     * The Http client implementation.
     */
    protected $http;

    protected $params = [
      'allow_redirects' => [
        'max'             => 3,        // allow at most 3 redirects.
        'strict'          => true,      // use "strict" RFC compliant redirects.
        'referer'         => true,      // add a Referer header
        'track_redirects' => true
      ],
      'http_errors' => false
    ];

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

    public function getHostFromUrl(string $url): string {
      $host = '';
      $urlParams = parse_url($url);
      if(isset($urlParams['host'])){
        $host = (string) $urlParams['host'];
      }else if(isset($urlParams['path'])){
        $host = (string) $urlParams['path'];
      }
      return $host;
    }

    public function post(string $url, array $params = []){
      try{
          $promises = [
              "commander_login" => $this->http->requestAsync('POST', $url, array_merge($this->params, $params))
          ];
          $results = Promise\unwrap($promises);
          return [
            'content' => $results['commander_login']->getBody()->getContents(),
            'code' => $results['commander_login']->getStatusCode()
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
