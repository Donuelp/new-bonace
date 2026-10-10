<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(JournalPostImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->belongsTo(JournalPostImage::class, 'main_image_id');
    }
}
