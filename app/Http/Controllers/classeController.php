<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class classeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }


}
