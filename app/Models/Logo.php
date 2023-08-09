<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array'
    ];
    protected $fillable = ['taken_id','link','images'];


}
