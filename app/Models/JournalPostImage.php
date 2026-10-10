<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalPostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'journal_post_id',
        'path',
        'original_name',
        'sort_order',
    ];

    public function post()
    {
        return $this->belongsTo(JournalPost::class, 'journal_post_id');
    }
}
