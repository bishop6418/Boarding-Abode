<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
