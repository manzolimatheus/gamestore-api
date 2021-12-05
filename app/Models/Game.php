<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'launch_date',
        'image_hero',
        'image_header',
        'image_screenshot',
        'link',
        'platforms',
        'genre',  
    ];
}
