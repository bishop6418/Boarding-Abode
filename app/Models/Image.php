<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function houses(){
        return $this->belongsToMany(House::class, 'house_image', 'house_id', 'image_id')->withTimestamps();
    }
}
