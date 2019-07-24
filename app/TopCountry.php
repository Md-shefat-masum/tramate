<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopCountry extends Model{
    protected $primaryKey='country_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'country_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'country_updator', 'id');
    }
}
