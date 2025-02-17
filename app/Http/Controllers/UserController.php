<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incommingFileds = $request->validate([
            'name' => ['required', 'string', 'max:25'], //required|string|max:255 is make sure the name is a string and not empty
            'email' => ['required', 'email'],     //required|email is make sure the email is in the correct format
            'password' => ['required', 'min:8', 'max:100'],   //required|min:8|max:15 is make sure the password is at least 8 characters and not more than 15 characters
        ]);
        return 'Thank you for registering!';
    }
}
 