<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class comments extends Model
{
    public function post () {
        return $this->belongsTo(posts::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    
}

