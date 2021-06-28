<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    public function images(){
        return $this->belongsToMany(Image::class, 'house_image', 'house_id', 'image_id')->withTimestamps();
    }

    public function user(){
        return $this->hasOne(User::class);
    }

}
