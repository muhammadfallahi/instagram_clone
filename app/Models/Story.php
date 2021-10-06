<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title', 'content', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(user::class);
    }


    public function images(){

        return $this->morphMany(Image::class, 'imageable');
    }
}

