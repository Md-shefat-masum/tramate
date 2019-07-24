<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model{
    protected $primaryKey='conin_id';

    public function updatorName(){
        return $this->belongsTo('App\User', 'conin_updator', 'id');
    }
}
