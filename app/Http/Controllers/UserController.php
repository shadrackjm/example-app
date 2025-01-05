<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = 'John Doe';
        $a = 30;
        $b = 20;

        $array = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'address' => '123 Main St'],
            ['name' => 'Jane Doe', 'email' => 'jane@example.com', 'address' => '456 Maple Ave'],
            ['name' => 'Shadrack', 'email' => 'shadrack@example.com', 'address' => '789 Oak Dr'],
        ];

        return view('welcome',compact('name','a','b','array',));
        // return view('welcome',['name' => $name]);
    }

    public function page2()
    {
        return view('test');
    }
}
