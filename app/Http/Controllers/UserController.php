<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incommingFileds = $request->validate([
            'name' => ['required', 'string', 'max:25'], //required|string|max:255 is make sure the name is a string and not empty
            'email' => ['required', 'email'],     //required|email is make sure the email is in the correct format
            'password' => ['required', 'min:8', 'max:100'],   //required|min:8|max:15 is make sure the password is at least 8 characters and not more than 15 characters
        ]);

        $incommingFileds['password'] = bcrypt($incommingFileds['password']); //bcrypt() is a helper function that encrypts the password that function is laravel already provided
        User::create($incommingFileds);      //User::create() is a function that laravel already provided to insert data into the database by using the model 

        return 'Thank you for registering!';
    }
}
 