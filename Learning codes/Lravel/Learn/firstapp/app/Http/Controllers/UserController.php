<?php

namespace App\Http\Controllers;

use App\Rules\UppercaseValidation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getUser(){
        return "Hello User Hasib";
    }


    function aboutUser(){
        return "Hello User Mostofa";
    }

    function userName($name){
        // return "Hello User $name";
        return view('about',[
            'name' => $name
        ]);
    }

    function user(){
        return view('user');
        
    }


    function nameView($name){
        echo "Hello User $name";
        return view('getuser',[
            'name' => $name
        ]);
    }

    // function adminLogin(){
    //     return view('admin.login');
    // }

    function variable(){
        $name = "Mostofa";
        $age = 20;

        $users = ['Mostofa', 'Hasib', 'Sakib'];
        return view('admin.login',[
            'name' => $name,
            'age' => $age,
            'users' => $users
        ]);
    }


    function userForm(request $request){
        // return request()->all();
       

        $request->validate([
            'name' => 'required | min: 5 | max: 10',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required | min: 5 | max: 10 | uppercase', 
            'phone' => 'required'
        ],[
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 5 characters',
            'name.max' => 'Name must not exceed 10 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
            'address.required' => 'Address is required',
            'address.uppercase' => 'Address must be uppercase',
            'phone.required' => 'Phone number is required'
        ]);

        echo "Name: ".$request->name;
        echo "<br>";

        echo "Email: ".$request->email;
        echo "<br>";

        echo "Password: ".$request->password;
        echo "<br>";

        echo "Address: ".$request->address;
        echo "<br>";



        // return view('user-form');
    }


    function userFormExtra(request $request){
        // return request()->all();
        echo "City: ".$request->city;
        echo "<br>";

        echo "Age: ".$request->city;
        echo "<br>";

        echo "Gender: ".$request->gender;
        echo "<br>";

        print_r($request->skill);

    }
}
