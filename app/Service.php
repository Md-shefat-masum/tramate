<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model{
    protected $primaryKey='service_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'service_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'service_updator', 'id');
    }

    public function serviceType(){
        return $this->belongsTo('App\ServiceType', 'service_type_id', 'service_type_id');
    }
}
