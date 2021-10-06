<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title', 'content', 'allow_comment', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(user::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function images(){

        return $this->morphMany(Image::class, 'imageable');
    }

    public function savedBy() {
        return $this->belongsToMany(User::class, 'save');
    }

    public function likes(){

        return $this->morphToMany(Post::class, 'likeable', 'like', 'user_id', 'likeable_id');
    }
}

