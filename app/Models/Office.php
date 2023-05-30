<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $table = 'offices';

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_en',
        'addres_ru',
        'addres_uz',
        'addres_en',
        'number',
        'gmail',
        'second_number',
        'second_gmail',
        'map'
    ];
}
