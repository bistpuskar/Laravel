<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = User::select('id','created_at','email','status')->get();
	return view('admin.user.index',compact('data')); 
}

public function add(){
	return view('admin.user.add');
}
}