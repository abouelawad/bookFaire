<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        #Creating new user
        $user = new User();
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        return $user->id;
    }

    public function login()
    {
        return view('users.login');
    }
    public function handelLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        // $token = $request->_token;
        $cred = [
            'email' => $email,
            'password' => $password

        ];

        // dd($request->all());


        if (Auth::attempt($cred)) {
            return redirect('dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function github()
    {
            return Socialite::driver('github')->redirect();
        
    }

    public function githubCallBack()
    {
        $github_user = Socialite::driver('github')->user();

        
        $dbUser = User::where('email', $github_user->email)->first();

        // dd($github_user);
        if($dbUser == null)
        {
            $newUser = new User;
            $newUser->name = $github_user->name;
            $newUser->email = $github_user->email;
            $newUser->social_token = $github_user->token;
            $newUser->password = Hash::make("$github_user->id");
            $newUser->save();
            $logInUSer = $newUser;
        }
        else
        {
            $logInUSer = $dbUser;
        }
        Auth::login($logInUSer);

        return redirect('dashboard');
    }
}
