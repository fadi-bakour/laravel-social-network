<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = ['name', 'label'];

    public function abilities(){
        return $this->belongsToMany(ability::class)->withTimestamps();
    }

    public function assignAbility($ability){
        $this->abilities()->sync($ability, false);
    }

}
