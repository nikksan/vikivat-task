<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use Hash;

class AuthController extends Controller{
    public function showLoginForm(){
    	return view('admin.pages.login');
    }

    public function login(Request $request){
    	if(!$request->has('email')){
    		return redirect()->back()->with('error', 'Email required');
    	}

    	if(!$request->has('password')){
    		return redirect()->back()->with('error', 'Password required');
    	}

    	$email =  $request->input('email');
    	$password = $request->input('password');

    	$user = User::where(['email' => $email])->first();

    	if(!$user){
    		return redirect()->back()->with('error', 'Invalid user');
    	}

    	if(!Hash::check($password, $user->getAuthPassword())){
    		return redirect()->back()->with('error', 'Wrong password');
    	}

    	if(!$user->hasRole(Role::ADMIN)){
    		return redirect()->back()->with('error', 'You dont have permission to access the admin');
    	}

    	Auth::login($user);
    	return redirect('admin/dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login')->with('success', 'You have succesfully logged out of your profile');
    }
}
