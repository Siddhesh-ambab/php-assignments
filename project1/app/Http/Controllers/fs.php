<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fs extends Controller
{
    function index(Request $request)
    {
        return $request->post('name');

    }
}
