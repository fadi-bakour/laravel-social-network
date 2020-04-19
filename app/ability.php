<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ability extends Model
{
    protected $fillable = ['name', 'label'];

    public function roles(){
        return $this->belongsToMany(role::class)->withTimestamps();
    }
}
