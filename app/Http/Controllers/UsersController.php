<?php namespace App\Http\Controllers;

use Users;
use Request;
use Result;

class UsersController extends Controller
{
	public function signup()
    {
	    $user = false;
	    
	    if (!empty(Request::input('email')) && Request::input('password')) {
	    	$user = Users::signup(Request::input('email'), Request::input('password'));
	    }
	    
	    if (!$user) {
		    return Result::build()
	        			->setError(true)
						->setData([
							'message'	=> 'This email already exists in the system'
						])->asJson();
	    } else {
		    return Result::build()
	        			->setError(false)
						->setData([
							'message'	=> 'Success',
							'token'		=> $user->token
						])->asJson();
	    }
    }
    
    public function login()
    {
	    $user = false;
	    
	    if (!empty(Request::input('email')) && Request::input('password')) {
	    	$user = Users::login(Request::input('email'), Request::input('password'));
	    }
	    
	    if (!$user) {
		    return Result::build()
	        			->setError(true)
						->setData([
							'message'	=> 'Can not find user with this email and password'
						])->asJson();
	    } else {
		    return Result::build()
	        			->setError(false)
						->setData([
							'message'	=> 'Success',
							'token'		=> $user->token
						])->asJson();
	    }
    }
    
    public function forgot()
    {
		return Result::build()
	        		->setError(false)
					->setData([
						'message'	=> 'Success'
					])->asJson();
    }
}