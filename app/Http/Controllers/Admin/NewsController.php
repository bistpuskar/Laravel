<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

	if ($request->hasFile('file')) {
        $image = $request->file('image');
        echo $image; die();
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();
        $destinationPath = public_path('/images/news');
        $image->move($destinationPath, $name);
	 $news->title = $news->input('title');
	 $news->image = $name;
        $news->save();
       return redirect()->route('admin.news');
}
}

}