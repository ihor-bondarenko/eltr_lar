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

    private function commanderToken(array $params){

    }

    public function login(string $url, array $params = [])
    {
      $params['token'] = md5(parse_url($url, PHP_URL_HOST));
      $params['form_params'] = $params;
      $res = $this->http->post($url . '/api/auth/login', $params);
      $resContent = (array) json_decode($res['content']);

      $token = isset($resContent['token']) ? $resContent['token'] : '';
      $status = isset($resContent['status']) ? $resContent['status'] : '';
      $message = isset($resContent['message']) ? $resContent['message'] : '';

      return [
        'token' => $token,
        'statusCode' => $res['code'],
        'status' => $status,
        'message' => $message
      ];
    }
}
