<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'content', 'allow_comment', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(user::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function images(){

        return $this->morphMany(Image::class, 'imageable');
    }
}

