<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    //
    public function index(){
      $user = Auth::user();
      //$user =  json_encode($user);

      return view('welcome',compact('user'));
    }

    public function add(){
      return view('add');
    }

    public function create(Request $request){
      $task = new Task();
      $task -> description = $request-> description;
      $task -> user_id = 1;
      $task -> save();
      return redirect('/');
    }

    public function edit(Task $task){
      if(Auth::check() && Auth::user()->id == user_id){
        return view('edit',compact(task));
      }else{
        return redirect('/');
      }
    }

    public function update(Request $request,Task $task){
      if(isset($_POST["DELETE"])){
        $task->delete();
        return redirect('/');
      }else{
        $task -> description = $request->description;
        $task->save();
      }
    }


}
