<?php

namespace App\Http\Controllers;

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

    function adminLogin(){
        return view('admin.login');
    }

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
            'address' => 'required | min: 5 | max: 10', 
            'phone' => 'required'
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
