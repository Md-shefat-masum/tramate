<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSearch extends Model{
    protected $primayKey='service_search_id';

    public function from(){
        return $this->belongsTo('App\From', 'from_id', 'from_id');
    }

    public function to(){
        return $this->belongsTo('App\To', 'to_id', 'to_id');
    }

    public function serviceType(){
        return $this->belongsTo('App\ServiceType', 'service_type_id', 'service_type_id');
    }

    public function service(){
        return $this->belongsTo('App\Service', 'service_id', 'service_id');
    }
}
