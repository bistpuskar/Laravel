<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
	protected $table = 'news_images';   

 protected $fillable = ['news_id','image_name'];
}
