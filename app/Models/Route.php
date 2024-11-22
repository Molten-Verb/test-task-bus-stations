<?php

namespace App\Models;

use App\Models\Bus;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function stations(): HasMany
    {
        return $this->hasMany(Station::class);
    }

    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class);
    }
}
