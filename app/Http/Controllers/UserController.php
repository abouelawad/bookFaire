<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('Authors/register');
    }

    public function store(Request $request )
    {
        $email = $request->email;
        $password = $request->password;

        
    }
}
