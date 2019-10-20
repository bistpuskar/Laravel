<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = Category::select('id','created_at','title','status')->get();
	return view('admin.category.index',compact('data')); 
}

public function add(){
	return view('admin.category.add');
}

public function store(){

}

}