<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'image',
        'title',
        'penerbit',
        'description',
        'price',
        'stock'
    ];

    use HasFactory;
}
