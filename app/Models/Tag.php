<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'post_id'
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {

            $post->slug = $post->createSlug($post->title);

            $post->save();
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title,$slug= null)
    {

        if (static::whereSlug($slug = Str::slug($title))->exists()) {

            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }


    public function posts()
    {
        $this->belongsToMany(Post::class);
    }

}
