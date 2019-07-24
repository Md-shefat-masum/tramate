<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model{
    protected $primaryKey='gallery_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'gallery_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'gallery_updator', 'id');
    }
}
