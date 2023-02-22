<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'no',
        'title',
        'start_date',
        'end_date',
    ];

    /**
     * Get all of the latestHistory for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function latestHistory(): HasMany
    {
        return $this->hasMany(History::class, 'book_id', 'id')->whereNull('return_date')->orderBy('id', 'desc');
    }
}
