<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

	protected $fillable = ['name', 'display_name', 'description'];


    public function user()
    {
        return $this->belongsToMany('App\User');
	}

    public function permission_role()
    {
        //return $this->hasManyThrough('App\Permission', 'App\PermissionRole', 'permission_id', 'role_id');
        return $this->belongsToMany('App\Permission');
    }
}












