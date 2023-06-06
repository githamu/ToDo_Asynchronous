<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo as modelTodo;
use App\Todo\Todo as todoTodo;
use Illuminate\Http\Request;

class TodoController extends Controller {

    private $todo;

    public function __construct() {
        $this->todo = new todoTodo();
    }

    public function ToDo() {
        return view('pages.index', ['todo' => $this->todo->getTodo(), 'todoList' => modelTodo::all()]);
    }

    public function saveTodo(Request $request) {

        $text = $request->input('text');
        $priority = $request->input('priority');

        $todo = new modelTodo();
        $todo->text = $text;
        $todo->priority = $priority;
        $todo->save();

        $todoList = modelTodo::all();

        return response()->json($todoList);
        
    }

    public function deleteTodo(Request $request) {

        $id = $request->input('id');

        modelTodo::where('id', $id)->delete();

        $todoList = modelTodo::all();

        return response()->json($todoList);
    }
    
}