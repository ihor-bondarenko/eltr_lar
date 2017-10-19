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
       $response = $this->json('POST', '/commander-login',
       [
         "username" => 'rs-system',
         "version_url" => 'https://einsatzv1.rucomm.com',
         "password" => "#xCommandery",
         "imei" => 'trainer',
         "module-name" => 'biometric_system',
         "type" => '3',
         "version_uuid" => "123456"
        ]);

       $response
           ->assertStatus(200)
           ->assertJson([])
           ->assertJsonFragment(['token'])
           ->assertJsonFragment(['status' => 1]);
   }
}
