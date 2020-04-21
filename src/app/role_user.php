<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $fillable = [
        'role_id','user_id'
    ];
    
    // protected $primaryKey = null;
    // // public $incrementing = false;

    public function getTable() 
{
    return 'role_user';
}

}
