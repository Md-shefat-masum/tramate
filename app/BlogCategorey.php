<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategorey extends Model{
    protected $primaryKey='cate_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'cate_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'cate_updator', 'id');
    }
}
