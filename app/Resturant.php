<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    protected $primaryKey='resturant_id';
    
    public function uploaderName(){
        return $this->belongsTo('App\User', 'resturant_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'resturant_uploader', 'id');
    }

    public function from(){
        return $this->belongsTo('App\From', 'from_id', 'from_id');
    }

    public function categorey(){
        return $this->belongsTo('App\ResturantCategorey', 'cate_id', 'cate_id');
    }
}
