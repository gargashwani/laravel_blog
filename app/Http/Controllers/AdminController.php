<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {   
        // Find auth middleware in app/kernel.php
        // Its RedirectIfAuthenticated.php
        // So, here, we are sending guard as admin in the auth middleware
        $this->middleware('auth:admin');

    }

    public function index()
    {
        return view('dashboard');
    }
}
