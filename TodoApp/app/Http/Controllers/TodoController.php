<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo2;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$todos = Todo2::all();

    	return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    protected function store(Request $request)
     {
    	$request->validate([
    	    'title'=>'required'
    	]);
	
    	$todos = new Todo2([
    	    'title' => $request->get('title'),
    	    'memo' => $request->get('memo')
    	]);
    	$todos->save();
    	return redirect('/todos')->with('success', 'todos saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
    	$todos = Todo2::find($id);
    	return view('todos.edit', compact('todos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$request->validate([
    	    'title'=>'required'
    	]);

    	$todos = Todo2::find($id);
    	$todos->title =  $request->get('title');
    	$todos->memo = $request->get('memo');
    	$todos->save();

    	return redirect('/todos')->with('success', 'Todo 更新完了');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    	$todos = Todo2::find($id);
    	$todos->delete();
	
    	return redirect('/todos')->with('success', 'Todo １つ完了');
    }


}
