<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const MODERATOR = 2;
    const USER = 3;

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
