<?php

namespace App;

use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
  protected $casts = [
    'user_id' => 'string'
  ];
}
