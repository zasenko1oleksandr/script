<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $primaryKey = 'translation_id';

    protected $fillable = [
        'blog_id',
        'locale',
        'title',
        'description',
        'text',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'blog_id');
    }
}
