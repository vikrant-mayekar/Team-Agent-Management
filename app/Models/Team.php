<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status'];

    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class);
    }

    public function isActive(): bool
    {
        return (int) $this->status === 1;
    }
}
