<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class qb extends Controller
{
    function insert(){
        DB::table('user')->insert(
            array('name'=>'siddhesh','age'=>22)
        );
    }

    function select(){
        $result=DB::table('user')->get() ;
        echo "<pre>" ;
        print_r($result);
    }

    function update(){
        DB::table('user')->where('id',1)->update(
            array('name'=>'sidhuuuuuu','age'=>22)
        );
    }

    function delete(){
        DB::table('user')->where('id',2)->delete();
    }


}
