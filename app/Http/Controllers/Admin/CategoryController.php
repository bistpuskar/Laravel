<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = Category::select('id','created_at','title','status')->get();
	return view('admin.category.index',compact('data')); 
}

public function add(){
	return view('admin.category.add');
}

public function store(Request $request){
	  $category = new category;
	    $category->title = $request->input('title');
        $category->save();
       return redirect()->route('admin.category');

}

}