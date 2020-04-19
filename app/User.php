<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name','username', 'email', 'password', 'cover', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }
    
    public function posts () {
        return $this->hasMany(posts::class)->latest();
    }

    public function timeline (){

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return posts::whereIn('user_id', $ids)->latest()->get();

    }


    public function follows (){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }


    public function following (user $user){
        return $this->follows()->where('following_user_id' , $user->id)->exists();
    }

    public function follow(user $user){
        return $this->follows()->save($user);
    }

    public function unfollow (user $user){
        return $this->follows()->detach($user);
    }


    public function beingfollowed (){
        return $this->belongsToMany(User::class, 'follows',  'following_user_id' ,'user_id');
    }

    public function followers (user $user){
        return $this->beingfollowed()->where('user_id' , $user->id)->exists();
    }

    public function roles(){
        return $this->belongsToMany(role::class)->withTimestamps();
    }

    public function assignRoles($role){
        $this->roles()->sync($role, false);
    }
    
    public function abilities (){
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}



