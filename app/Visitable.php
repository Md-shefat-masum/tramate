<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitable extends Model{
    protected $primaryKey='visitable_id';
    
    public function uploaderName(){
        return $this->belongsTo('App\User', 'visitable_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'visitable_uploader', 'id');
    }

    public function from(){
        return $this->belongsTo('App\From', 'from_id', 'from_id');
    }
}
