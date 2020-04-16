<?php

namespace App\Http\Controllers;
use App\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){

    	//$todos = Todos::all();
    	
    	return view('todos.index')->with('todos',Todos::all());
    }

    public function show(Todos $todos){
    	//$todos = Todos::find($id);
    	
    	return view('todos.show')->with('todos',$todos);
    }

     public function create(){

        return view('todos.create');
    }

    public function edit(Todos $todos)
    {
      return view('todos.edit')->with('todo', $todos);
    }

     public function store(){
     	
     	$this->validate(request(),[
          'name' => 'required|min:6|max:15',
          'description' => 'required'
     	]);
       $data = request()->all();
       $todo = new Todos();
       $todo->name =$data['name'];
       $todo->description =$data['description'];
       $todo->completed =false;
       $todo->save();
       session()->flash('success','Todos created successfully.');
       return redirect('/todos');
    }

    public function update(Todos $todos){
     	
     	$this->validate(request(),[
          'name' => 'required|min:6|max:15',
          'description' => 'required'
     	]);
       $data = request()->all();
       //$todo = Todos::find($id);

       $todos->name =$data['name'];
       $todos->description =$data['description'];
       $todos->save();
       session()->flash('success','Todos updated successfully.');
       return redirect('/todos');
    }

    public function destroy(Todos $todos){
     	//$todo = Todos::find($id);

     	$todos->delete();
     	session()->flash('success','Todos deleted successfully.');
        return redirect('todos');
    }

    public function complete(Todos $todos){
     	//$todo = Todos::find($id);
        $todos->completed =true;
     	$todos->save();
     	session()->flash('success','Todos completed successfully.');
        return redirect('todos');
    }
}
