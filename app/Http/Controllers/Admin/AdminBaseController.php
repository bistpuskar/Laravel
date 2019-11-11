<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AdminBaseController extends Controller{
	protected function loadDataToView($view_path){
		view::composer($view_path, function($view){
			$view->with('base_route','$this->base_route');
		});
		return $view_path;
	}

}