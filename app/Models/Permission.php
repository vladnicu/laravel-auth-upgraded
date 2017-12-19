<?php

namespace Cook\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
        
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
