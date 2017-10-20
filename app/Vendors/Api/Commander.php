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
    /**
     * Generate commander API token from url .
     *
     * @param  HttpClient  $http
     * @return void
     */
    private function commanderToken(string $url): string {
        return md5($this->http->getHostFromUrl($url));
    }

    public function login(string $url, array $params = [])
    {
      $params['token'] = $this->commanderToken($url);
      $res = $this->http->post($url . '/api/auth/login', ['form_params' => $params]);
      $resContent = (array) json_decode($res['content']);
      return [
        'token' => $resContent['token'] ?? '',
        'statusCode' => $res['code'] ?? 0,
        'status' => $resContent['status'] ?? '',
        'message' => $resContent['message'] ?? ''
      ];
    }
}
