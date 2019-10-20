<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = User::select('id','created_at','email','status')->get();
	return view('admin.user.index',compact('data')); 
}

public function add(){
	return view('admin.user.add');
}

public function store(Request $request){
<<<<<<< HEAD
	$user = new user;
        $user->title = $request->input('email');
        $user->save();
       return redirect()->route('user');
=======
	    $user = new user;
        $user->email = $request->input('email');
        $user->save();
       return redirect()->route('admin.user');
>>>>>>> ba4c13c8a26c45b29a0673784939dcba3e4c3347

}

}