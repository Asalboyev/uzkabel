<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title_uz','title_ru','title_en','body_uz','body_ru','body_en','images','slug','category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function boot()
    {
        parent::boot();
        static::saving(function ($product){
            $product->slug =\Str::slug($product->title_uz);
        });
    }
}
