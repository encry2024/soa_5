<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

	protected $fillable = ['name', 'display_name', 'description'];


    public function user()
    {
        return $this->belongsToMany('App\User', 'role_user');
	}

    public function permission_role()
    {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }

    public function permission()
    {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }
}












