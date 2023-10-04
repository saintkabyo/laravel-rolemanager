<?php

namespace Riasad\Rolemanager\Models;

use App\Models\User as ModelsUser;

class User extends ModelsUser
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function checkPermission($permission)
    {
        foreach($this->roles as $role)
        {
            if($role->permissions()->where('name',$permission)->exists())
                return true;            
        }
        return false;
    }
}
