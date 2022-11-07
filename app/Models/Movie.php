<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'is_published', 'image', 'category_id', 'user_id', 'slug'
    ];

    // protected static function boot()
    // {
    //     parent::boot();
  
    //     static::created(function ($movie) {
    //         $movie->slug = $movie->createSlug($movie->title);
    //         $movie->save();
    //     });
    // }
  
    // /** 
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // private function createSlug($title){
    //     if (static::whereSlug($slug = Str::slug($title))->exists()) {
    //         $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
  
    //         if (is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }
  
    //         return "{$slug}-2";
    //     }
  
    //     return $slug;
    // }
}
