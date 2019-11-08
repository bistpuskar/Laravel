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
	$data['rows'] = News::select('id','created_at','title','status')->get();
	return view('admin.news.index',compact('data')); 
}

public function add(){
	return view('admin.news.add');
}

<<<<<<< HEAD
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
=======
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
>>>>>>> 020fa75752cf78503b3cee19f47105b5bd6b2411
}

}