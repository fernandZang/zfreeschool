<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eleveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {
        return view('eleve.home');
    }
}
