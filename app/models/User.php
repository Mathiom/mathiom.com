<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table 	= 'users';
	protected $hidden 	= ['password'];
	protected $fillable = ['email', 'password'];



	/**
	 * Attempts to log the user in using VALIDATED data
	 * @param  [ARR] $creds	Credentials [email, password]
	 * @return [OBJ]       	NULL if failed, the user object if passed
	 */
	static function login($creds = null)
	{
		$creds = $creds ?: Input::only('email', 'password');
		return Auth::attempt($creds);
	}


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}