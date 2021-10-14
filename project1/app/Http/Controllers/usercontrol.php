<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontrol extends Controller
{
    function na($id){
        // echo "hello".$name;
        return view('home',array('id'=>$id));
    }
}
