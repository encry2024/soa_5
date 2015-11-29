<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

	protected $fillable = ['name', 'display_name', 'description'];


    public function roles()
    {
        return $this->hasMany('App\Role');
    }

    public function permission_role()
    {
        return $this->hasMany('App\PermissionRole');
    }
}
