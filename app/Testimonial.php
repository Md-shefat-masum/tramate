<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model{
    protected $primaryKey='testi_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'testi_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'testi_updator', 'id');
    }
}
