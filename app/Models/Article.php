<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'description',
        'cover',
        'keywords',
        'content',
        'html',
        'is_top',
        'comment',
        'view',
        'author_id',
        'video'
    ];
}
