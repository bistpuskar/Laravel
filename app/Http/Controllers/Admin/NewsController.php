<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends AdminBaseController{
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
	return view($this->view_path.'.index',compact('data')); 
}

public function add(){
	return view($this->view_path.'.add');
}
public function store(Request $request){
	 // $validator = Validator::make($request->all(), [
  //           'title' => 'required|unique:posts|max:255',
  //           'body' => 'required',
  //       ]);

  //       if ($validator->fails()) {
  //           return redirect('post/create')
  //                       ->withErrors($validator)
  //                       ->withInput();
  //       }
	if($request->hasFile('main_image')){
		$image = $request->file('main_image');
		$path = public_path(). '/images/news';
	    $filename = time() . '.' . $image->getClientOriginalExtension();
	    $image->move($path, $filename);
	}
	$now = date('Y-m-d H:i'); //Fomat Date and time
        $now = $request->published_date;
        // dd($now);
	$request->request->add([
		'title' => str_slug($request->get('title')),
		'writer' => $request->get('writer'),
		'short_desc' => $request->get('short_desc'),
		'detail_desc' => $request->get('detail_desc'),
		'published_date' => $now,
		'status' => $request->get('status') == 'active'?1:0,
		'image' => isset($filename) ? $filename:null
	]);
	// dd($request->all());
	News::create($request->all());
	$request->session()->flash('sucess_message','News added Sucessfully');
	return redirect()->route($this->base_route);
}
public function edit(Request $request,$id){
	$data = [];
	$data['row'] = News::where('id',$id)->first();
	return view($this->view_path.'.add',compact('data'));

}
public function update(Request $request,$id){
$data = [];
	$data['row'] = News::where('id',$id)->first();
	if($request->hasFile('main_image')){
		$image = $request->file('main_image');
		$path = public_path(). '/images/news';
	    $filename = time() . '.' . $image->getClientOriginalExtension();
	    $image->move($path, $filename);
	    if ($data['row']->image && file_exists($path.$data['row']->image)) {
	    unlink($path.$data['row']->image);
	    }
	}
	$now = date('Y-m-d H:i'); //Fomat Date and time
        $now = $request->published_date;
	$request->request->add([
		'title' => str_slug($request->get('title')),
		'writer' => $request->get('writer'),
		'short_desc' => $request->get('short_desc'),
		'detail_desc' => $request->get('detail_desc'),
		'published_date' => $now,
		'status' => $request->get('status') == 'active'?1:0,
		'image' => isset($filename) ? $filename:$data['row']->image 
	]);
	$data['row']->update($request->all());
	$request->session()->flash('sucess_message','News Updated Sucessfully');
	return redirect()->route($this->base_route);
}
public function delete(Request $request,$id){
$data = [];
	$data['row'] = News::where('id',$id)->first();
	if(!$data['row']){
		$request->session->flash('error_message','Invalid Request');
		return redirect()->route($this->base_route);
	}	
	$path = public_path(). '/images/news';
	 if ($data['row']->image && file_exists($path.$data['row']->image)) {
	    unlink($path.$data['row']->image);
	}
		$data['row']->delete();
		 $request->session()->flash('sucess_message','News Deleted Sucessfully');
		return redirect()->route($this->base_route);
}
}