<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller{
public function index(){
	$data = [];
	$data['rows'] = News::select('id','created_at','title','status')->get();
	return view('admin.news.index',compact('data')); 
}

public function add(){
	return view('admin.news.add');
}

public function store(Request $request){ 
	$news = new news;
	 $news->title = $news->input('title');
        $news->save();
       return redirect()->route('admin.news');
}

}