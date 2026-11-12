<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // <--- Додайте цей рядок
use App\Models\Filter; // <--- Переконайтеся, що модель Filter імпортована (якщо вона в цій самій папці, можна пропустити, але краще додати)

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    public const CREATED_AT = 'dt_created';
    public const UPDATED_AT = 'dt_updated';

    protected $fillable = [
        'title',
        'description',
        'text',
        'category_id',
        'user_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'category_id'
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function translations()
    {
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'blog_id');
    }

    public function getTranslatedAttribute($field)
    {
        $locale = request('lang', 'uk');

        $translation = $this->translations->where('locale', $locale)->first();

        if ($translation && !empty($translation->$field)) {
            return $translation->$field;
        }

        return $this->$field;
    }

    public function filters(): BelongsToMany
    {
        return $this->belongsToMany(
            Filter::class,
            'blog_filter',
            'blog_id',
            'filter_id'
        );
    }
}
