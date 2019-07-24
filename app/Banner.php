<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{
    protected $primaryKey='ban_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'ban_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'ban_updator', 'id');
    }
}
