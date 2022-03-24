<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'author_id',
        'title',
        'short_description',
        'amount',
    ];

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

}
