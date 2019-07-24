<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model{
    protected $primaryKey='abc_id';

    public function updatorName(){
        return $this->belongsTo('App\User', 'abc_updator', 'id');
    }
}
