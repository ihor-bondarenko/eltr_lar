<?php

namespace App\Vendors\Http;

use \GuzzleHttp\Client as Http;
use \Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Handler\CurlHandler;
use \GuzzleHttp\Promise;
use \GuzzleHttp\Exception\RequestException;

class HttpClient
{
    /**
     * The Http client implementation.
     */
    protected $http;

    /**
     * The Http client implementation.
     */
    protected $tasks = [];

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
     * @param  GuzzleHttpClient  $http
     * @return void
     */
    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * Get array of HTTP responses from task list
     *
     * @return void
     */
    private function getTasksResponse(&$results, &$result) {
      if(is_array($results)) {
        foreach($results as $key => $res) {
          $content = '';
          $code = '';
          if(isset($res['value'])) {
            $content = $res['value']->getBody()->getContents();
            $code = $res['value']->getStatusCode();
          }else{
            $this->getResponseError($res, $content, $code);
          }
          $result[$key] = [
            'content' => $content,
            'code' => $code
          ];
          unset($results[$key]);
        }
      }
      if(!count($result)) {
        $result = [
          'content' => json_encode(["error" => 'empty_response_content']),
          'code' => 0
        ];
      }
    }

    /**
     * Get ERROR response from task
     *
     * @return void
     */
    private function getResponseError($res, &$content, &$code) {
      if(isset($res['reason']) && $res['reason'] instanceof RequestException) {
        $error = $res['reason'];
        $errorContext = $error->getHandlerContext();
        $content = $errorContext['error'] ?? 'unexpected_error';
        $code = $errorContext['errno'] ?? 500;
      }else{
        $content = "unexpected_error";
        $code = 500;
      }
      $content = json_encode(["error" => $content]);
    }

    /**
     * Add HTTP request task to the list
     *
     * @param  string  $key
     * @param  string  $method
     * @param  string  $url
     * @param  array  $params
     * @return void
     */

    public function addTask(string $key, string $method, string $url, array $params = []) {
        if(array_key_exists($key, $this->tasks)) {
          unset($this->tasks[$key]);
        }
        $key = $key ?? 'task';
        $method = $method ?? 'POST';
        $url = $url ?? url("/");
        $this->tasks[$key] = $this->http->requestAsync($method, $url, array_merge($this->params, $params));
    }

    /**
     * Run HTTP request task from the list
     *
     * @return array
     */

    public function runTasks() {
      $promises = [];
      $result = [];
      if(count($this->tasks) > 0) {
        foreach($this->tasks as $key => $task){
          $promises[$key] = $task;
        }
        $results = Promise\settle($promises)->wait();
        $this->getTasksResponse($results, $result);
      }
      return $result;
    }

    /**
     * Get HOST from URL
     *
     * @return string
     */
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

    /**
     * Make HTTP POST request
     *
     * @return array["content", "code"]
     */
    public function post(string $url, array $params = []) {
      try{
        $this->addTask('post_task', 'POST', $url, array_merge($this->params, $params));
        $res = $this->runTasks();

        return $res["post_task"];
      }catch(RequestException $e){
        if ($e->hasResponse()) {
          return $e->getResponse();
        }
        return [
          "content" => json_encode(["error" => 'unexpected_error']),
          "code" => 0
        ];
      }
    }
    public function get(){}
    public function delete(){}
    public function put(){}
    public function request(){}
}
