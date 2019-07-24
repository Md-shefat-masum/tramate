<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model{
    protected $primaryKey='hotel_id';

    public function uploaderName(){
        return $this->belongsTo('App\User', 'hotel_uploader', 'id');
    }

    public function updatorName(){
        return $this->belongsTo('App\User', 'hotel_uploader', 'id');
    }

    public function from(){
        return $this->belongsTo('App\From', 'from_id', 'from_id');
    }

    public function hotelName(){
        return $this->belongsTo('App\Service', 'hotel_name', 'service_id');
    }
}
