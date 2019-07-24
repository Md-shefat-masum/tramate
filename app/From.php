<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class From extends Model{
    protected $primaryKey='from_id';
    
    public function uploaderName(){
        return $this->belongsTo('App\User', 'from_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'from_updator', 'id');
    }

    public function hotels(){
        return $this->hasMany('App\Hotels', 'from_id', 'from_id');
    }
    
    public function resturant(){
        return $this->hasMany('App\Resturant', 'from_id', 'from_id');
    }

    public function visitable(){
        return $this->hasMany('App\Visitable', 'from_id', 'from_id');
    }

    public function speciality(){
        return $this->hasMany('App\Speciality', 'from_id', 'from_id');
    }
    
}
