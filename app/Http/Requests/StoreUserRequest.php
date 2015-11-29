<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class StoreUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
		];
	}


    public function messages()
    {
        return [
            'name.required' => 'Please provide user\'s name',
            'email.required' => 'Please provide user\'s email',
            'email.unique' => 'E-mail is already in use. Please choose another e-mail',
            'password.required' => 'Please provide user\'s password',
            'password.confirmed' => 'Password do not match'
        ];
    }

}
