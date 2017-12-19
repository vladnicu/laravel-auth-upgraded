<?php 

namespace Cook\Permissions;

use Cook\Models\{Role, Permission};
    
trait HasPermissionsTrait {
    //
    
    public function hasPermissionTo ($permission) 
    {
        return $this->hasPermission($permission);
        
    }
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) 
        {
            if($this->roles->contains('name', $role))
            {
                return true;
            }
            
        }
        
        return false;
    }
    
    protected function hsPermission($permission) 
    {
        return (bool) $this->permissions->where ('name', $permission->name)->count();
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}