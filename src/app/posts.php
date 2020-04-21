<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    
    protected $fillable  = ['user_id' , 'body', 'image'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function comments () {
        return $this->hasMany(Comments::class)->latest();
        
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

   


    public function getTotalLikesAttribute()
    {
       return $this->hasMany(like::class)->where($this->post_id)->where('liked', true)->count();
    }

    public function getTotaldisLikesAttribute()
    {
       return $this->hasMany(like::class)->where($this->post_id)->where('liked', false)->count();
    }

    public function like()
    {

        if ($this->likes()->where('user_id' , auth()->id())->pluck('liked')->first() == '1'){

            $this->likes()->updateOrCreate(
                [
                    'user_id' =>  auth()->id(),
                ],
    
                [
                    'liked' => null,
                ]
            );
        }

        else {

            $this->likes()->updateOrCreate(
                [
                    'user_id' =>  auth()->id(),
                ],
    
                [
                    'liked' => true,
                ]
            );
        }

    }

    public function dislike()
    {
    if ($this->likes()->where('user_id' , auth()->id())->pluck('liked')->first() == '0'){

        $this->likes()->updateOrCreate(
            [
                'user_id' =>  auth()->id(),
            ],

            [
                'liked' => null,
            ]
        );
    }
    
    else {

        $this->likes()->updateOrCreate(
            [
                'user_id' =>  auth()->id(),
            ],

            [
                'liked' => false,
            ]
        );
    }

}


    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('posts_id', $this->id)
            ->where('liked', '1')
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('posts_id', $this->id)
            ->where('liked', '0')
            ->count();
    }
    









}
