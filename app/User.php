<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function user_role()
    {
        return $this->hasMany('App\Roles');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public static function storeUser($data)
    {
        $message = "";
        $alert = "";

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        if( ! $user->save()) {
            $message = "User was not able to save";
            $alert = "negative";
        }

        $message = "User " . $user->name . " has been successfully saved";
        $alert = "positive";

        return redirect()->back()->with('message', $message)->with('alert', $alert);
	}

    public static function editUser($user)
    {
        $role_ids = DB::table('roles')
            ->leftJoin('role_user', function($join) {
                $join->on('roles.id', '=', 'role_user.role_id');
            })
            ->join('users', function($join) {
                $join->on('users.id', '=', 'role_user.user_id');
            })
            ->where('users.id', '=', $user->id)
            ->lists('role_id');

        $roles = Role::all();


        return view('user.edit', compact('user', 'roles', 'role_ids'));
    }

}
