<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($name=null)
    {
            return 'Hello '. $name;
    }

    public function redirect()
    {
            return redirect()->route('admin.users.show');
    }

    public function show()
    {
            return view('test');
    }
}
