<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model{
    protected $primaryKey='plan_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'plan_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'plan_updator', 'id');
    }
}
