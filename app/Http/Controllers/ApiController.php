<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function test()
    {
        return "test API";
    }

    public function books()
    {
        $books = Book::get();
        return response()->json($books);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $cred = ['email' => $email, 'password' => $password];
        if(Auth::attempt($cred))
        {
            $user = User::find(Auth::user()->id);
            if(!$user->access_token)
            {
                $user->access_token = Str::random(64);
                $user->save();
            }
            return response()->json($user->access_token);
        }else{
           return response()->json('not auth');
        }
    }
}
 