<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * 前端显示时间
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

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

    /**
     * 关联category模型
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    /**
     * 管理user模型
     */
    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
