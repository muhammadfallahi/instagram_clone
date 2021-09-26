<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'bio',
        'phone_number',
        'public',
        'website',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function images(){

        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follow','user_id','follow');
    }

    // public function follower(){
    //     return $this->hasMany(User::class, 'user_id','follow');
    // }

    //  public function following(){
    //     return $this->hasMany(User::class, 'follow','user_id');
    // }

    public function blocks(){
        return $this->belongsToMany(User::class, 'block','user_id','block');
    }
}
