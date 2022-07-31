<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{

    public function __construct()
    {
    	//
    }

    public function index()
    {
    	return view("login");
    }

    public function login(Request $request){
		$this->validate($request, [
	        'username' => 'required',
	        'password' => 'required|min:8',
			'remember' => 'nullable'
	    ]);
		
		$remember = $request->remember ? true : false;

	    if (\Auth::attempt([
	        'username' => $request->username,
	        'password' => $request->password], $remember)
	    ){
	    	return redirect('/home');
	    }

	    return redirect('/login')->with('error', 'The username or password is incorrect');
	}
	/* GET
	*/
	public function logout(Request $request)
	{
	    if(\Auth::check())
	    {
	        \Auth::logout();
	        $request->session()->invalidate();
	    }
	    return  redirect('/login');
	}

    public function home(Request $request)
    {
    	return view("index");
    }
}
