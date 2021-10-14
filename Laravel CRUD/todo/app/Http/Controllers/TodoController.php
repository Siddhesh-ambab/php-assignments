<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('todo_insert');
    }

    
    public function store(Request $request)
    {
            $res=new todo();
            $res->fname=$request->input('fname');

            $res->lname=$request->input('lname');
            $res->save();

            //   $fname=$request->input('fname');
            // $lname=$request->input('lname');
            // $request->save();

            $request->session()->flash('msg','Record Inserted');
            return redirect('todo_show');

        // return $request->input();
    }

    
    public function show(todo $todo)
    {
        // return view('todo_show')->with('tdarr',todo::paginate(4));
        return view('todo_show',['tdarr'=>todo::paginate(4)]);

    }

  
    public function edit(todo $todo,$id)
    {
        // echo $id;
        // return view('todo_edit')->with('tdarr',todo::find($id));
        return view('todo_edit',['tdarr'=>todo::find($id)]);

    }

    
    public function update(Request $request, todo $todo)
    {
        // print_r($request->id);

        $res=todo::find($request->id);
        $res->fname=$request->input('fname');

        $res->lname=$request->input('lname');
        $res->save();

        $request->session()->flash('msg','Record updated');
        return redirect('todo_show');

    }

    
    public function destroy(todo $todo,$id)
    {
        // echo "<pre>";
        // print_r($id);
        todo::destroy(array('id',$id));
        return redirect('todo_show');
    }
}
