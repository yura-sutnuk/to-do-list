<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Task;
use App\User;

Route::get('/', function () {
    if(!session('id',false))
    {
        return redirect('/registration');
    }
    $tasks = Task::where('userId',session('id'))->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/task',function (Request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->userId = $request->session()->get('id');
    $task->save();

   return redirect('/');

});

Route::get('/registration', function(){
    return view('registration');
});

Route::post('/tryRegister',function(Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required|unique:users,name|max:255',
        'pass' => 'required',
    ]);
    if($validator->fails())
    {
        return redirect('/registration')
            ->withInput()
            ->withErrors($validator);
    }

    $user = new User;
    $user->name = $request->name;
    $user->pass = $request->pass;
    $user->save();

    session(['id'=>$user->id]);
    return redirect('/');

});

Route::delete('/task/{task}', function(Task $task){
    $task->delete();

    return redirect('/');
});

Route::get('/exit',function(Request $request){
    $request->session()->flush();
    return redirect('/authorization');
});

Route::get('/authorization', function(){
    return view('autorization');
});

Route::post('/tryAutorization',function(Request $request){
   $name = $request->get('name');
   $pass = $request->get('pass');
   $user = User::where('name',$name)->where('pass',$pass)->get();

   if(!isset($user[0]->id)) {
       // TODO обработка ошибки "пользователь не найден"
      return redirect('/authorization');

   }
   session(['id' => $user[0]->id]);
   return redirect('/');
});