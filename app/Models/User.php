<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    public function stories(){
        return $this->hasMany(Story::class);
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function images(){

        return $this->morphMany(Image::class, 'imageable');
    }


    public function follower(){
        return $this->belongsToMany(user::class, 'follow','follow', 'user_id');
    }

     public function following(){
        return $this->belongsToMany(user::class, 'follow','user_id','follow');
    }

    public function blocks(){
        return $this->belongsToMany(User::class, 'block','user_id','block');
    }

    public function mentions(){
        return $this->belongsToMany(Post::class, 'mention','user_id', 'post_id');
    }


    public function saves() {
        return $this->belongsToMany(Post::class, 'save');
    }

    public function likes(){

        return $this->morphToMany(post::class, 'likeable','like','post_id','user_id');
    }

      /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    
}
