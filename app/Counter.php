<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model{
    protected $primaryKey='counter_id';

    public function updatorName(){
        return $this->belongsTo('App\User', 'counter_updator', 'id');
    }
}
