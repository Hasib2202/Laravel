<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameUrl extends Controller
{
    //

    function show(){

        // return redirect()->to('name/url/user');
        return to_route('nm');
    }

    function nameTest(){

        // return redirect()->to('name/url/user');
        return to_route('nameTest', ['name'=> 'Mostofa']);
    }

}
