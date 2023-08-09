<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title_uz','title_ru','title_en','body_uz','body_ru','body_en','images','slug','category_id','
    date'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function boot()
    {
        parent::boot();
        static::saving(function ($post){
            $post->slug =\Str::slug($post->title_uz);
        });
    }

}
