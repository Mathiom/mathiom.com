<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table 	= 'users';
	protected $hidden 	= ['password'];
	protected $fillable = ['email', 'password'];
	protected $guarded 	= ['id', 'confirmation', 'confirmation_timestamp'];



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
	 * Attempts to register using VALIDATED data
	 * @param  [ARR] $creds Validated credentials [email, password]
	 * @return [OBJ]        NULL if failed, the user object if passed
	 */
	static function register($creds = null)
	{
		$creds = $creds ?: Input::only('email', 'password');
		$creds['password'] = Hash::make($creds['password']);

		$user = new User($creds);
		$user->save();
		Auth::login($user);
		
		return $user;
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