<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = User::select('id','created_at','username','address','contact_no','email','status')->get();
	return view('admin.user.index',compact('data')); 
}

public function add(){
	return view('admin.user.add');
}

public function store(Request $request){
	    $user = new user;
	    $user->username = $request->input('username');
	    $user->address = $request->input('address');
	    $user->contact_no = $request->input('contact_no');
        $user->email = $request->input('email');
        $user->save();
       return redirect()->route('admin.user');

}

}