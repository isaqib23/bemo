<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ["title"];

    /**
     * @return HasMany
     */
    public function cards() {
        return $this->hasMany(Card::class, 'column_id');
    }
}
