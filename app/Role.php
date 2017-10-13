<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
  protected $casts = [
    'user_id' => 'string'
  ];
}
