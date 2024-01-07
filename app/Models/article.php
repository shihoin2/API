<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'body',
        'tagList',
        'created_at',
    ];

    protected $casts = [
        'tagList' => 'json'
    ];
}
