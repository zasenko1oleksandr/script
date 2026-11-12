<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primaryKey = 'author_id';

    protected $fillable = [
        'name',
        // інші поля автора за потреби
    ];

    public function books()
    {
        return $this->belongsToMany(
            Book::class,
            'author_book',
            'author_id',
            'book_id',
            'author_id',
            'book_id'
        );
    }
}
