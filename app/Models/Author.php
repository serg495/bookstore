<?php

namespace App\Models;

use App\Traits\Filterable;
use App\ValueObjects\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
    ];

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * @return Name
     */
    public function getNameAttribute(): Name
    {
        return new Name($this->firstname, $this->lastname);
    }
}
