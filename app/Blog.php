<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    protected $primaryKey='blog_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'blog_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'blog_updator', 'id');
    }

    public function cateName(){
        return $this->belongsTo('App\BlogCategorey', 'blog_cate_id', 'cate_id');
    }

    public function roleName(){
        return $this->belongsTo('App\UserRole', 'blog_role_id', 'role_id');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'blog_id', 'blog_id');
    }

    public function scopePublished($query, $status)
    {
        $query->where('blog_status', $status);
    }

}
