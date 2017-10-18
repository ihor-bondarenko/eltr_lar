<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CommanderApiLoginTest extends TestCase
{
  /**
   * A basic functional test example.
   *
   * @return void
   */

    public function testBasicExample()
   {
      // $response = $this->json('GET', '/test', []);
    //  $user = User::where('username','administrator') -> first();

       $response = $this->json('POST', '/commander-login',
       [
         "username" => '',
         "version_url" => '10.0.0.147',
         "password" => "",
         "imei" => 'trainer',
         "module-name" => 'biometric_system',
         "type" => '3',
         "token" => md5(parse_url('http://10.0.0.147', PHP_URL_HOST)),
         "version_uuid" => "123456"
        ]);

       $response
           ->assertStatus(200)
           ->assertJson([])
           ->assertJsonFragment(['token']);
   }
}
