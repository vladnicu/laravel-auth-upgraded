<?php 

namespace App\Permissions;

use App\Models\{Role, Permission};
    
trait HasPermissionsTrait {
    //
    
    public function givePermissionTo(...$permissions)
    {
        $permisssions = $this->getAllPermissions(array_flatten($permissions));
        
        if ($permissions ===null){
            return this; 
        } 
        //get permission models
        //saveMany
        
        dd($permissions);
    }
    public function hasPermissionTo ($permission) 
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        
    }
    
    public function withdrawPermissionTo (...$permissions)
    {
        $permisssions = $this->getAllPermissions(array_flatten($permissions));
        $this->permissions()->detach($permissions);
        
        return $this;
    }
    public function updatePermission (...$permissions) 
    {
        $this->permissions()->detach();
        
        return $this->givePermissionTo($permissions);
    }
    
    protected function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if ($this->roles->contains($role)){
                return true;
            }
        }
        
        return false;
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
    
    protected function hasPermission($permission) 
    {
        return (bool) $this->permissions->where ('name', $permission->name)->count();
    }
    
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name', $permissions)->get();
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