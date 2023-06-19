<?php

namespace App\Models;

use Database\Factories\ResortFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resort extends Model
{
    use HasFactory;

    protected static function newFactory(): ResortFactory
    {
        return ResortFactory::new();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
