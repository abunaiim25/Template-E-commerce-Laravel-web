<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $fillable = [

        'email',
        'phone1',
        'phone2',
        'address',
        'font_img',
        'second_font_img',
        'social1',
        'social2',
        'social3',
        'social4'
    ];
}
