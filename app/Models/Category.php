<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =['name_uz','name_ru','name_en','slug','images','taken'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public static function boot()
    {
        parent::boot();
        static::saving(function ($category){
            $category->slug =\Str::slug($category->name_uz);
        });
    }

}
