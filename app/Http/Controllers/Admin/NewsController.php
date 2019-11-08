<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller{
	protected $base_route = 'admin.news';
	protected $view_path = 'admin.news';
	protected $panel = 'News';
	protected $folder_name = 'news';
	protected $folder_path ;

	public function __construct(){
	
	}
public function index(){
	$data = [];
	$data['rows'] = News::select('id','created_at','title','status')->get();
	return view('admin.news.index',compact('data')); 
}

public function add(){
	return view('admin.news.add');
}

public function store(Request $request){
	if($request->hasFile('main_image')){
		$image = $request->file('main_image');
		$path = public_path(). '/images/news';
	    $filename = time() . '.' . $image->getClientOriginalExtension();
	    $image->move($path, $filename);
	}
	$request->request->add([
		'title' => str_slug($request->get('title')),
		'status' => $request->get('status') == 'active'?1:0,
		'image' => $path
	]);
	News::create($request->all());
	return redirect()->route('admin.news');
}

}