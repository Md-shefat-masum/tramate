<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    protected $primaryKey='comment_id';

    public function reply(){
        return $this->hasMany('App\Reply', 'comment_id', 'comment_id');
    }
}
