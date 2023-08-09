<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantag extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array'
    ];
    protected $fillable = ['title_uz','name_uz','name_ru','name_en','title_ru','title_en','body_uz','body_ru','body_en','images'];

}
