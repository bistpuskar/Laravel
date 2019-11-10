<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
	$data['rows'] = News::select('id','created_at','title','image','status')->get();
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
		'writer' => $request->get('writer'),
		'short_desc' => $request->get('short_desc'),
		'detail_desc' => $request->get('detail_desc'),
		'status' => $request->get('status') == 'active'?1:0,
		'image' => isset($filename) ? $filename:null
	]);
	News::create($request->all());
	$request->session()->flash('sucess_message','News added Sucessfully');
	return redirect()->route('admin.news');
}
public function edit(Request $request,$id){
	$data = [];
	$data['row'] = News::where('id',$id)->first();
	return view('admin.news.add');

}
public function update(Request $request,$id){
$data = [];
	$data['row'] = News::where('id',$id)->first();
	if($request->hasFile('main_image')){
		$image = $request->file('main_image');
		$path = public_path(). '/images/news';
	    $filename = time() . '.' . $image->getClientOriginalExtension();
	    $image->move($path, $filename);
	}
	$request->request->add([
		'title' => str_slug($request->get('title')),
		'writer' => $request->get('writer'),
		'short_desc' => $request->get('short_desc'),
		'detail_desc' => $request->get('detail_desc'),
		'status' => $request->get('status') == 'active'?1:0,
		'image' => isset($filename) ? $filename:null
	]);
	$data['row']->update($request->all());
}
public function delete(Request $request,$id){
$data = [];
	$data['row'] = News::where('id',$id)->first();
	if(!$data['row']){
		$request->session->flash('error_message','Invalid Request');
		return redirect()->route('admin.news');
		$data['row']->delete();
		$request->session->flash('sucess_message','News Deleted Sucessfully');
		return redirect()->route('admin.news');
	}	
}
}