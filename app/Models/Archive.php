<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
         'archiveable_id', 'archiveable_type'
    ];


    public function archiveable(){
        return $this->morphTo();
    }
}

