<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    protected $primaryKey='member_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'member_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'member_updator', 'id');
    }
}
