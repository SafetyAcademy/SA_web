<?php namespace App\Libraries;

use Illuminate\Database\Eloquent\Model as Model;

class Users extends Model
{
    protected $table = 'users';
    
    public static function signup($email, $password)
    {
		$user = static::where([
				'email'	=> $email
			])->first();
		
		if (!$user) {
			$user = new static;
			$user->email = $email;
			$user->password = md5($password);
			$user->token = md5(time());
			$user->save();
		} else {
			$user = false;
		}
		
		return $user;
    }
    
    public static function login($email, $password)
    {
		$user = static::where([
				'email'		=> $email,
				'password'	=> md5($password),
			])->first();
		
		return $user;
    }
}