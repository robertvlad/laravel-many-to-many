<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Post;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($name) {
        
        return Str::slug($name, '-');
    }

    public function posts() {

        return $this->belongsToMany(Post::class);
    }
}
