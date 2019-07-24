<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwesomePackage extends Model{
    protected $primaryKey='awesome_id';
    
    public function uploaderName(){
        return $this->belongsTo('App\User', 'awesome_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'awesome_updator', 'id');
    }
}
