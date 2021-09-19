<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'alt', 'path', 'imageable_id', 'imageable_type'
    ];


       /**

     * Boot the model.
     * making alt for images using slug ways

     */

    protected static function boot()
    {
        parent::boot();

        static::created(function ($image) {

            $image->alt = $image->createAlt($image->title);

            $image->save();
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createAlt($title,$alt= null)
    {

        if (static::whereAlt($alt = str::slug($title))->exists()) {

            $max = static::whereTitle($title)->latest('id')->skip(1)->value('alt');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$alt}-2";
        }
        return $alt;
    }



    public function imageable(){
        return $this->morphTo();
    }
}

