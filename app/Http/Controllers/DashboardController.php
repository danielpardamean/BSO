<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct() {
        $this->middleware('loggedIn');
    }

    public function index ()
    {
        return view('dashboard');
    }
}
