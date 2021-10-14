<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class validation extends Controller
{
    function va(Request $request)
    {
        $request->validate([
            'pass'=>'required',
            'email'=>'required|email'
        ]);

        $email=$request->input('email');
        $pass=$request->input('pass');

        if($email=='s@gmail.com' && $pass=='1234'){
            $request->session()->put('name','siddhesh');
            return redirect('page2');
        }
        else{
            $request->session()->flash('error','invalid email or password');
            return redirect('forms');
        }

        // echo "hello";
        // return $request->post('name');
    }

    function logout(Request $r){
        $r->session()->forget('name');
        $r->session()->flash('error','logout successfully');
        return redirect('forms');
    }


}
