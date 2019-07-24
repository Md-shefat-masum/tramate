<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationSlider extends Model{
    protected $primaryKey='slider_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'slider_uploader', 'id');
    }

    public function categoryName(){
        return $this->belongsTo('App\DestiCate', 'slider_category', 'descate_id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'slider_updator', 'id');
    }
}
