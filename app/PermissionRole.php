<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PermissionRole extends Eloquent {

	protected $table = 'permission_role';


	public function permissions()
	{
		return $this->belongsToMany('App\Permission');
	}

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
