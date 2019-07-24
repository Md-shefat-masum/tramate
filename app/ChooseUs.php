<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChooseUs extends Model{
    protected $primaryKey='choose_id';
    
    public function uploaderName(){
        return $this->belongsTo('App\User', 'choose_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'choose_updator', 'id');
    }
}
