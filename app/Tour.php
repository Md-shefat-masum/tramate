<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model{
    protected $primaryKey='tour_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'tour_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'tour_updator', 'id');
    }
}
