<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model{
    protected $primayKey="speciality_id";

    public function uploaderName(){
        return $this->belongsTo('App\User', 'speciality_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'speciality_updator', 'id');
    }

    public function from(){
        return $this->belongsTo('App\From', 'from_id', 'from_id');
    }
}