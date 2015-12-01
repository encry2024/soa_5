<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\RoleUser;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {
    /**
     * UserController constructor.
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreUserRequest $data)
	{
        $store_user = User::storeUser($data->all());

        return $store_user;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user)
	{
		$roles = Role::all();
		return view('user.show', compact('user', 'roles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $user
	 * @return Response
	 */
	public function edit($user)
	{
        $edit_user = User::editUser($user);

		return $edit_user;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $user)
	{
        dd($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function updateRoles(User $user, Request $request, $user_id)
    {
        $userModel = User::find($user_id);
        $userModel->name = $request->get('name');
        $userModel->email = $request->get('email');
        $userModel->save();

        // detach role from user
        $userModel->detachRoles(Role::all());

        //insert new roles
        foreach ($request->get('role') as $role_request) {
            $userModel->attachRole(Role::whereName($role_request)->first());
        }

        return Redirect::back()->with('msg', ' was successfully updated.');
	}

}
