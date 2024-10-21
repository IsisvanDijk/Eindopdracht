<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'image',
        'author',
        'age_category',
        'genre_id',
        'description',
    ];

    public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Genre::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);


    }
}
