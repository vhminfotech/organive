<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\blog;

class blogComment extends Model
{
    protected $table = 'blog_comment';
    
    public function  blog() {
        
        return $this->belongsTo('App\model\blog');
    }
}
